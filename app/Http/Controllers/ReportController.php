<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function branchReport()
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

        return view('report.branch-report', [
            'branches' => $branches
        ]);
    }

    public function subBranchReport()
    {
        return view('report.sub-branch-report');
    }

    public function employeeReport()
    {
        $employees_grouped_by_department = DB::table('employees')
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
            )
            ->orderBy('departments.department_order')
            ->orderBy('employees.employee_position_order')
            ->get()
            ->groupBy('department_name');

        // dd($employees_grouped_by_department);

        return view('report.employee-report', [
            'employees_grouped_by_department' => $employees_grouped_by_department
        ]);
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
