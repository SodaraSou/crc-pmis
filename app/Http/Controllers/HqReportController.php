<?php

namespace App\Http\Controllers;

use App\Models\Employee;

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
                function ($cp) {
                    $cp->where('employee_level_id', 1);
                }
            )
            ->with([
                'current_position' => function ($cp) {
                    $cp->where('employee_level_id', 1)
                        ->with([
                            'department:id,kh_name,department_order',
                            'position:id,kh_name'
                        ]);
                },
            ])
            ->get()
            ->sortBy('current_position.department.department_order')
            ->groupBy('current_position.department');

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
