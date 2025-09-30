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

    public Branch $branch;

    public $per_page = 25;

    #[Url(except: '')]
    public $search = "";

    #[Url(except: '')]
    public $department_id = "";
    public $filter_department = null;

    public function mount(Branch $branch): void
    {
        $this->branch = $branch;
    }

    public function updatedDepartmentId()
    {
        $this->filter_department = Department::find($this->department_id);
    }

    public function render(): View
    {
        $query = Employee::query();

        $query->whereHas('employee_positions', function ($ep) {
            $ep->where('active', true)
                ->where('branch_id', $this->branch->id);

            if ($this->department_id) {
                $ep->where('department_id', $this->department_id);
            }
        });

        return view('livewire.branch.branch-employee-table', [
            'employees' => $query->paginate($this->per_page),
            'departments' => Department::all()
        ]);
    }
}
