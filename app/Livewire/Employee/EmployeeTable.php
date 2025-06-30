<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeTable extends Component
{
    use withPagination;

    public $per_page = 25;

    #[Url()]
    public $search = '';

    public function render(): View
    {
        $query = Employee::query();

        if ($this->search) {
            $query->where('kh_name', 'like', '%'.$this->search.'%');
        }

        if (Auth::user()->user_level_id == 2) {
            $query->where('branch_id', Auth::user()->branch_id);
        }

        if (Auth::user()->user_level_id == 3) {
            $query->where('sub_branch_id', Auth::user()->sub_branch_id);
        }

        $employees = $query->paginate($this->per_page);

        return view('livewire.employee.employee-table', [
            'employees' => $employees,
        ]);
    }
}
