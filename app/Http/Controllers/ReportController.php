<?php

namespace App\Http\Controllers;

class ReportController extends Controller
{
    public function branchReport()
    {
        return view('report.branch-report');
    }

    public function subBranchReport()
    {
        return view('report.sub-branch-report');
    }

    public function employeeReport()
    {
        return view('report.employee-report');
    }

    public function honoraryCommitteeReport()
    {
        return view('report.honorary-committee-report');
    }

    public function committeeReport()
    {
        return view('report.committee-report');
    }
}
