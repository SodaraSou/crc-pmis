<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\DB;

class HqReportController extends Controller
{
    public function reportIndex()
    {
        $committees = DB::table('committees')
            ->where('committee_level_id', '<', 3)
            ->select('id', 'kh_name')
            ->get()
            ->map(function ($committee) {
                $baseQuery = DB::table('committee_member')
                    ->join('members', 'members.id', '=', 'committee_member.member_id')
                    ->leftJoin('branch_terms', 'branch_terms.id', '=', 'committee_member.branch_term_id')
                    ->leftJoin('sub_branch_terms', 'sub_branch_terms.id', '=', 'committee_member.sub_branch_term_id')
                    ->leftJoin('committees', 'committees.id', '=', 'committee_member.committee_id')
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
                    });

                $total_honorary_member = $baseQuery->where('committees.committee_type_id', 1)->count();
                $total_member = $baseQuery->where('committees.committee_type_id', 2)->count();

                return (object)[
                    'id' => $committee->id,
                    'kh_name' => $committee->kh_name,
                    'total_honorary_member' => $total_honorary_member,
                    'total_member' => $total_member,
                    'total_employee' => 0,
                ];
            });

        // dd($committees);

        return view('hq-report.hq-report-index', [
            'committees' => $committees
        ]);
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
        $committees = DB::table('committees')
            ->where('committee_type_id', 1)
            ->select('id', 'kh_name')
            ->get()
            ->map(function ($committee) {
                $members = DB::table('committee_member')
                    ->join('members', 'members.id', '=', 'committee_member.member_id')
                    ->leftJoin('branch_terms', 'branch_terms.id', '=', 'committee_member.branch_term_id')
                    ->leftJoin('sub_branch_terms', 'sub_branch_terms.id', '=', 'committee_member.sub_branch_term_id')
                    ->leftJoin('genders', 'genders.id', '=', 'members.gender_id')
                    ->leftJoin('committee_positions', 'committee_positions.id', '=', 'committee_member.committee_position_id')
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
                        'genders.kh_abbr as gender_abbr',
                        'committee_member.gov_position as gov_position',
                        'committee_positions.kh_name as committee_position',
                        'branch_terms.kh_name as branch_term',
                        'sub_branch_terms.kh_name as sub_branch_term'
                    )
                    ->get();

                return (object)[
                    'id' => $committee->id,
                    'kh_name' => $committee->kh_name,
                    'members' => $members,
                ];
            });

        return view('hq-report.hq-report-honorary-committee', [
            'committees' => $committees
        ]);
    }

    public function committeeReport()
    {
        $committees = DB::table('committees')
            ->where('committee_type_id', 2)
            ->select('id', 'kh_name')
            ->get()
            ->map(function ($committee) {
                $members = DB::table('committee_member')
                    ->join('members', 'members.id', '=', 'committee_member.member_id')
                    ->leftJoin('branch_terms', 'branch_terms.id', '=', 'committee_member.branch_term_id')
                    ->leftJoin('sub_branch_terms', 'sub_branch_terms.id', '=', 'committee_member.sub_branch_term_id')
                    ->leftJoin('genders', 'genders.id', '=', 'members.gender_id')
                    ->leftJoin('committee_positions', 'committee_positions.id', '=', 'committee_member.committee_position_id')
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
                        'genders.kh_abbr as gender_abbr',
                        'committee_member.gov_position as gov_position',
                        'committee_positions.kh_name as committee_position',
                        'branch_terms.kh_name as branch_term',
                        'sub_branch_terms.kh_name as sub_branch_term'
                    )
                    ->get();

                return (object)[
                    'id' => $committee->id,
                    'kh_name' => $committee->kh_name,
                    'members' => $members,
                ];
            });

        return view('hq-report.hq-report-committee', [
            'committees' => $committees
        ]);
    }
}
