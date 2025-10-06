<?php

namespace App\Http\Controllers;

use App\Models\Department;

class HqReportController extends Controller
{
    public function reportIndex()
    {
        return view('hq-report.hq-report-index');
    }

    public function employeeReport()
    {
        $departments = Department::orderBy('department_order')
            ->with([
                'employees' => function ($e) {
                    $e->where('employees.active', true)
                        ->where('employee_status_id', 1)
                        ->whereHas('current_position', function ($cp) {
                            $cp->where('employee_level_id', 1);
                        })
                        ->orderBy('employee_position_order');
                }
            ])
            ->get();

        return view('hq-report.hq-report-employee', [
            'departments' => $departments
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
