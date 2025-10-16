<?php

namespace App\Livewire\Report;

use App\Models\Branch;
use App\Models\Department;
use App\Models\SubBranch;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;

class EmployeeReport extends Component
{
    #[Url(except: '')]
    public $branch_id = 0;
    public $filter_branch = null;

    #[Url(except: '')]
    public $sub_branch_id = '';
    public $filter_sub_branch = null;
    public $sub_branches = [];

    #[Url(except: '')]
    public $department_id = '';
    public $filter_department = null;

    public function mount()
    {
        if ($this->branch_id) {
            $this->filter_branch = Branch::find($this->branch_id);
            $this->sub_branches = SubBranch::where('branch_id', $this->branch_id)->get();
        }

        if ($this->sub_branch_id) {
            $this->filter_sub_branch = SubBranch::find($this->sub_branch_id);
        }

        if ($this->department_id) {
            $this->filter_department = Department::find($this->department_id);
        }
    }

    public function resetFilter()
    {
        $this->reset('branch_id', 'sub_branch_id', 'department_id');
        $this->filter_branch = null;
        $this->filter_sub_branch = null;
        $this->filter_department = null;
        $this->sub_branches = [];
    }

    public function removeFilter($filter)
    {
        if ($filter == 'branch') {
            $this->sub_branch_id = '';
            $this->filter_sub_branch = null;
            $this->sub_branches = [];
            $this->branch_id = 0;
            $this->filter_branch = null;
        } elseif ($filter == 'sub_branch') {
            $this->sub_branch_id = '';
            $this->filter_sub_branch = null;
        } elseif ($filter == 'department') {
            $this->department_id = '';
            $this->filter_department = null;
        }
    }

    public function updatedBranchId()
    {
        $this->filter_branch = Branch::find($this->branch_id);
        $this->sub_branch_id = '';
        $this->filter_sub_branch = null;
        $this->sub_branches = SubBranch::where('branch_id', $this->branch_id)->get();
    }

    public function updatedSubBranchId()
    {
        $this->filter_sub_branch = SubBranch::find($this->sub_branch_id);
    }

    public function updatedDepartmentId()
    {
        $this->filter_department = Department::find($this->department_id);
    }

    public function render()
    {
        $query = DB::table('employees')
            ->leftJoin('genders', 'genders.id', '=', 'employees.gender_id')
            ->leftJoin('employee_position', 'employee_position.employee_id', '=', 'employees.id')
            ->leftJoin('positions', 'positions.id', '=', 'employee_position.position_id')
            ->leftJoin('departments', 'departments.id', '=', 'employee_position.department_id')
            ->leftJoin('offices', 'offices.id', '=', 'employee_position.office_id')
            ->where('employees.active', true)
            ->where('employee_position.active', true)
            ->where('departments.active', true)
            ->where('employee_position.start_date', '<=', now()->toDateString())
            ->whereNull('employee_position.end_date')
            ->select(
                'employees.title',
                'employees.kh_name as name',
                'employees.phone_number',
                'departments.kh_name as department_name',
                'departments.department_order',
                'offices.kh_name as office_name',
                'genders.id as gender_id',
                'genders.kh_abbr as gender',
                'positions.female_kh_name as position_female',
                'positions.male_kh_name as position_male',
                'employee_position.opt_position_name',
            );

        if ($this->branch_id) {
            $query->where('employee_position.branch_id', $this->branch_id)
                ->whereNull('employee_position.sub_branch_id');
        }

        if ($this->sub_branch_id) {
            $query->where('employee_position.sub_branch_id', $this->sub_branch_id);
        }

        if ($this->department_id) {
            $query->where('departments.id', $this->department_id);
        }

        $employees_grouped_by_department = $query
            ->orderBy('departments.department_order')
            ->orderBy('employees.employee_position_order')
            ->get()
            ->groupBy('department_name');

        return view('livewire.report.employee-report', [
            'branches' => Branch::all(),
            'departments' => Department::all(),
            'employees_grouped_by_department' => $employees_grouped_by_department
        ]);
    }
}
