<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BranchEmployeeTable extends Component
{
    use WithPagination;

    public $per_page = 25;

    #[Url()]
    public $search = "";

    public Branch $branch;

    public function mount(Branch $branch): void
    {
        $this->branch = $branch;
    }

    public function render(): View
    {
        $query = Employee::query();

        $employees = $query
            ->where('branch_id', $this->branch->id)
            ->paginate($this->per_page);

        return view('livewire.branch.branch-employee-table', [
            'employees' => $employees,
            'departments' => Department::all()
        ]);
    }
}
