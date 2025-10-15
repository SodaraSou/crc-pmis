<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\DB;

class HqReportController extends Controller
{
    public function reportIndex()
    {
        $branches = DB::table('branches')
            ->select(
                'branches.id as branch_id',
                'branches.kh_name as branch_name',
            )
            ->get()
            ->map(function ($branch) {
                $base_query = DB::table('committee_member')
                    ->leftJoin('branch_terms', 'branch_terms.id', '=', 'committee_member.branch_term_id')
                    ->leftJoin('sub_branch_terms', 'sub_branch_terms.id', '=', 'committee_member.sub_branch_term_id')
                    ->leftJoin('committees', 'committees.id', '=', 'committee_member.committee_id')
                    ->where('committees.branch_id', $branch->branch_id)
                    ->where('committee_member.active', true)
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

                $total_honorary_member = $base_query->where('committees.committee_type_id', 1)->count();
                $total_member = $base_query->where('committees.committee_type_id', 2)->count();
                $current_term = DB::table('branch_terms')
                    ->where('branch_terms.branch_id', $branch->branch_id)
                    ->where('branch_terms.active', true)
                    ->where('branch_terms.start_date', '<=', now()->toDateString())
                    ->whereNull('branch_terms.end_date')
                    ->first();
                $total_employee = DB::table('employees')
                    ->leftJoin('employee_position', 'employee_position.employee_id', '=', 'employees.id')
                    ->where('employees.active', true)
                    ->where('employee_position.active', true)
                    ->where('employee_position.branch_id', $branch->branch_id)
                    ->where('employee_position.start_date', '<=', now()->toDateString())
                    ->whereNull('employee_position.end_date')
                    ->count();

                return [
                    'branch_name' => $branch->branch_name,
                    'total_honorary_member' => $total_honorary_member,
                    'total_member' => $total_member,
                    'total_employee' => $total_employee,
                    'current_term' => (object) $current_term
                ];
            });

        return view('hq-report.hq-report-index', [
            'branches' => $branches
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
        $members = DB::table('members')
            ->leftJoin('genders', 'genders.id', '=', 'members.gender_id')
            ->leftJoin('committee_member', 'committee_member.member_id', '=', 'members.id')
            ->leftJoin('committee_positions', 'committee_positions.id', '=', 'committee_member.committee_position_id')
            ->leftJoin('committees', 'committees.id', '=', 'committee_member.committee_id')
            ->leftJoin('branch_terms', 'branch_terms.id', '=', 'committee_member.branch_term_id')
            ->leftJoin('sub_branch_terms', 'sub_branch_terms.id', '=', 'committee_member.sub_branch_term_id')
            ->where('members.active', true)
            ->where('committee_member.active', true)
            ->where('committees.branch_id', 0)
            ->where('committees.committee_type_id', 1)
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
                'members.kh_name as member_name',
                'genders.kh_abbr as gender',
                'committee_member.gov_position as gov_position',
                'committee_positions.kh_name as committee_position',
                'branch_terms.kh_name as branch_term',
                'sub_branch_terms.kh_name as sub_branch_term'
            )
            ->get();

        return view('hq-report.hq-report-honorary-committee', [
            'members' => $members
        ]);
    }

    public function committeeReport()
    {
        $members = DB::table('members')
            ->leftJoin('genders', 'genders.id', '=', 'members.gender_id')
            ->leftJoin('committee_member', 'committee_member.member_id', '=', 'members.id')
            ->leftJoin('committee_positions', 'committee_positions.id', '=', 'committee_member.committee_position_id')
            ->leftJoin('committees', 'committees.id', '=', 'committee_member.committee_id')
            ->leftJoin('branch_terms', 'branch_terms.id', '=', 'committee_member.branch_term_id')
            ->leftJoin('sub_branch_terms', 'sub_branch_terms.id', '=', 'committee_member.sub_branch_term_id')
            ->where('members.active', true)
            ->where('committee_member.active', true)
            ->where('committees.branch_id', 0)
            ->where('committees.committee_type_id', 2)
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
                'members.kh_name as member_name',
                'genders.kh_abbr as gender',
                'committee_member.gov_position as gov_position',
                'committee_positions.kh_name as committee_position',
                'branch_terms.kh_name as branch_term',
                'sub_branch_terms.kh_name as sub_branch_term'
            )
            ->get();

        return view('hq-report.hq-report-committee', [
            'members' => $members
        ]);
    }
}
