<?php

namespace App\Livewire\Report;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;

class EmployeeReport extends Component
{
    #[Url(except: '')]
    public $branch_id = '';
    public $branch = null;

    #[Url(except: '')]
    public $sub_branch_id = '';
    public $sub_branch = null;

    #[Url(except: '')]
    public $department_id = '';
    public $department = null;

    public function mount() {
        
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
                'genders.kh_abbr as gender',
                'positions.kh_name as position',
                'employee_position.opt_position_name',
            );

        if ($this->department_id) {
            $query->where('departments.id', $this->department_id);
        }

        $employees_grouped_by_department = $query
            ->orderBy('departments.department_order')
            ->orderBy('employees.employee_position_order')
            ->get()
            ->groupBy('department_name');

        return view('livewire.report.employee-report', [
            'employees_grouped_by_department' => $employees_grouped_by_department
        ]);
    }
}
