<?php

namespace App\Livewire\SubBranch;

use App\Models\Department;
use App\Models\Employee;
use App\Models\SubBranch;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SubBranchEmployeeTable extends Component
{
    use WithPagination;

    public SubBranch $sub_branch;

    public $per_page = 25;

    #[Url(except: '')]
    public $search = "";

    #[Url(except: '')]
    public $department_id = "";
    public $filter_department = null;

    public function mount(SubBranch $sub_branch)
    {
        $this->sub_branch = $sub_branch;
    }

    public function updatedDepartmentId()
    {
        $this->filter_department = Department::find($this->department_id);
    }

    public function render()
    {
        $query = Employee::query();

        $query->whereHas('employee_positions', function ($ep) {
            $ep->where('active', true)
                ->where('sub_branch_id', $this->sub_branch->id);

            if ($this->department_id) {
                $ep->where('department_id', $this->department_id);
            }
        })->with(['current_position']);

        return view('livewire.sub-branch.sub-branch-employee-table', [
            'employees' => $query->paginate($this->per_page),
            'departments' => Department::all()
        ]);
    }
}
