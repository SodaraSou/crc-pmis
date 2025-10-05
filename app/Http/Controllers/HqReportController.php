<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class HqReportController extends Controller
{
    public function reportIndex()
    {
        return view('hq-report.hq-report-index');
    }

    public function employeeReport()
    {
        $grouped_employees_by_department = Employee::where('active', true)
            ->where('employee_status_id', 1)
            ->whereHas(
                'current_position',
                fn($cp) =>
                $cp->where('employee_level_id', 1)
            )
            ->with([
                'current_position' => function ($cp) {
                    $cp->where('employee_level_id', 1)
                        ->with([
                            'department:id,kh_name',
                            'position:id,kh_name'
                        ]);
                },
            ])
            ->get()
            ->groupBy('current_position.department_id');

        // $grouped_employees_by_department = DB::table('employees as e')
        //     ->join('positions as p', 'p.id', '=', 'e.current_position_id')
        //     ->join('departments as d', 'd.id', '=', 'p.department_id')
        //     ->where('e.active', true)
        //     ->where('e.employee_status_id', 1)
        //     ->where('p.employee_level_id', 1)
        //     ->select(
        //         'e.id as employee_id',
        //         'e.kh_name as employee_name',
        //         'p.kh_name as position_name',
        //         'd.id as department_id',
        //         'd.kh_name as department_name'
        //     )
        //     ->get()
        //     ->groupBy('department_id')
        //     ->map(function ($employees, $departmentId) {
        //         $department = $employees->first();
        //         return [
        //             'department_id' => $department->department_id,
        //             'department_name' => $department->department_name,
        //             'employees' => $employees,
        //         ];
        //     });

        // dd($grouped_employees_by_department);

        return view('hq-report.hq-report-employee', [
            'grouped_employees_by_department' => $grouped_employees_by_department
        ]);
    }

    public function honoraryCommitteeReport()
    {
        return view('hq-report.hq-report-honorary-committee');
    }

    public function committeeReport()
    {
        return view('hq-report.hq-report-committee');
    }
}
