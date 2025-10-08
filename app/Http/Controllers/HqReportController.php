<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\DB;

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
        $test = DB::table('committees')
            ->where('committee_type_id', 1)
            ->select('id', 'kh_name')
            ->get()
            ->map(function ($committee) {
                $members = DB::table('committee_member')
                    ->join('members', 'members.id', '=', 'committee_member.member_id')
                    ->leftJoin('branch_terms', 'branch_terms.id', '=', 'committee_member.branch_term_id')
                    ->leftJoin('sub_branch_terms', 'sub_branch_terms.id', '=', 'committee_member.sub_branch_term_id')
                    ->where('committee_member.committee_id', $committee->id)
                    ->where('committee_member.active', true)
                    ->where('members.active', true)
                    ->where(function ($query) {
                        $query->where(function ($q) {
                            $q->where('branch_terms.active', true)
                                ->where('branch_terms.start_date', '<=', now()->toDateString())
                                ->whereNull('branch_terms.end_date');
                        })
                            ->orWhere(function ($q) {
                                $q->where('sub_branch_terms.active', true)
                                    ->where('sub_branch_terms.start_date', '<=', now()->toDateString())
                                    ->whereNull('sub_branch_terms.end_date');
                            });
                    })
                    ->select(
                        'members.id',
                        'members.kh_name',
                    )
                    ->get();

                return (object)[
                    'id' => $committee->id,
                    'kh_name' => $committee->kh_name,
                    'members' => $members,
                ];
            });

        return view('hq-report.hq-report-honorary-committee', [
            'committees' => $test
        ]);
    }

    public function committeeReport()
    {
        return view('hq-report.hq-report-committee');
    }
}
