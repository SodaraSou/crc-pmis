<?php

namespace App\Livewire\Report;

use App\Models\Branch;
use App\Models\SubBranch;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;

class SubBranchReport extends Component
{
    #[Url(except: '')]
    public $branch_id = 1;
    public $filter_branch = null;
    public $branches = [];
    public $sub_branches = [];

    public function mount()
    {
        $this->branches = Branch::all();
        $this->filter_branch = Branch::find($this->branch_id);
    }

    public function updatedBranchId()
    {
        $this->sub_branches = SubBranch::where('branch_id', $this->branch_id)->get();
    }

    public function render()
    {
        $sub_branches = DB::table('sub_branches')
            ->where('branch_id', $this->branch_id)
            ->select(
                'sub_branches.id as sub_branch_id',
                'sub_branches.kh_name as sub_branch_name',
            )
            ->get()
            ->map(function ($sub_branch) {
                $base_query = DB::table('committee_member')
                    ->leftJoin('sub_branch_terms', 'sub_branch_terms.id', '=', 'committee_member.sub_branch_term_id')
                    ->leftJoin('committees', 'committees.id', '=', 'committee_member.committee_id')
                    ->where('committees.sub_branch_id', $sub_branch->sub_branch_id)
                    ->where('committee_member.active', true)
                    ->Where(function ($q) {
                        $q->where('sub_branch_terms.active', true)
                            ->where('sub_branch_terms.start_date', '<=', now()->toDateString())
                            ->whereNull('sub_branch_terms.end_date');
                    });

                $total_honorary_member = (clone $base_query)->where('committees.committee_type_id', 1)->count();
                $total_member = (clone $base_query)->where('committees.committee_type_id', 2)->count();
                $current_term = DB::table('sub_branch_terms')
                    ->where('sub_branch_terms.sub_branch_id', $sub_branch->sub_branch_id)
                    ->where('sub_branch_terms.active', true)
                    ->where('sub_branch_terms.start_date', '<=', now()->toDateString())
                    ->whereNull('sub_branch_terms.end_date')
                    ->first();
                $total_employee = DB::table('employees')
                    ->leftJoin('employee_position', 'employee_position.employee_id', '=', 'employees.id')
                    ->where('employees.active', true)
                    ->where('employee_position.active', true)
                    ->where('employee_position.sub_branch_id', $sub_branch->sub_branch_id)
                    ->where('employee_position.start_date', '<=', now()->toDateString())
                    ->whereNull('employee_position.end_date')
                    ->count();

                return [
                    'sub_branch_name' => $sub_branch->sub_branch_name,
                    'total_honorary_member' => $total_honorary_member,
                    'total_member' => $total_member,
                    'total_employee' => $total_employee,
                    'current_term' => (object) $current_term
                ];
            });

        return view('livewire.report.sub-branch-report');
    }
}
