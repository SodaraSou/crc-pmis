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
                'current_employees' => function ($ce) {
                    $ce->where('employee_status_id', 1)
                        ->with('current_position')
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
