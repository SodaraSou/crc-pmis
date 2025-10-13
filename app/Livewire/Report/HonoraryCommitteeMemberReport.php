<?php

namespace App\Livewire\Report;

use App\Models\Branch;
use App\Models\BranchTerm;
use App\Models\Committee;
use App\Models\CommitteeLevel;
use App\Models\SubBranchTerm;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;

class HonoraryCommitteeMemberReport extends Component
{
    #[Url(except: '')]
    public $committee_level_id = '';
    public $filter_committee_level = null;

    #[Url(except: '')]
    public $committee_id = '';
    public $filter_committee = null;
    public $committees = [];

    #[Url(except: '')]
    public $branch_id = '';
    public $filter_branch = null;
    public $branches = [];

    #[Url(except: '')]
    public $term_id = '';
    public $filter_term = null;
    public $terms = [];

    public function mount() {}

    public function updatedCommitteeLevelId()
    {
        if ($this->committee_level_id == 3) {
            $this->branches = Branch::all();
            $this->reset('committee_id');
            $this->filter_committee = null;
            $this->committees = [];
        } else {
            $this->committees = Committee::where('committee_level_id', $this->committee_level_id)
                ->where('committee_type_id', 1)
                ->get();
        }
    }

    public function updatedBranchId()
    {
        $this->committees = Committee::where('branch_id', $this->branch_id)
            ->where('committee_type_id', 1)
            ->where('committee_level_id', 3)
            ->get();
    }

    public function updatedCommitteeId()
    {
        $this->filter_committee = Committee::find($this->committee_id);
        if ($this->committee_level_id < 3) {
            $this->terms = BranchTerm::where('active', true)
                ->where('branch_id', $this->filter_committee->branch->id)
                ->get();
        } elseif ($this->committee_level_id == 3) {
            $this->terms = SubBranchTerm::where('active', true)
                ->where('sub_branch_id', $this->filter_committee->sub_branch->id)
                ->get();
        }
    }

    public function render()
    {
        $query = DB::table('members')
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
                'members.member_position_order as member_position_order',
                'genders.kh_abbr as gender',
                'committee_member.gov_position as gov_position',
                'committee_positions.kh_name as committee_position',
                'branch_terms.kh_name as branch_term',
                'sub_branch_terms.kh_name as sub_branch_term'
            );

        return view('livewire.report.honorary-committee-member-report', [
            'committee_levels' => CommitteeLevel::all(),
            'members' => $query
                ->orderBy('members.member_position_order')
                ->get()
        ]);
    }
}
