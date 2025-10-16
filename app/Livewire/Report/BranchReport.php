<?php

namespace App\Livewire\Report;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BranchReport extends Component
{
    public function render()
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

                $total_honorary_member = (clone $base_query)->where('committees.committee_type_id', 1)->count();
                $total_member = (clone $base_query)->where('committees.committee_type_id', 2)->count();
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

        return view('livewire.report.branch-report', [
            'branches' => $branches
        ]);
    }
}
