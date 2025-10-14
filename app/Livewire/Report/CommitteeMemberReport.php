<?php

namespace App\Livewire\Report;

use App\Models\Branch;
use App\Models\BranchTerm;
use App\Models\Committee;
use App\Models\SubBranchTerm;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;

class CommitteeMemberReport extends Component
{
    #[Url(except: '')]
    public $branch_id = '';
    public $filter_branch = null;
    public $branches = [];

    #[Url(except: '')]
    public $committee_id = '';
    public $filter_committee = null;
    public $committees = [];

    #[Url(except: '')]
    public $term_id = '';
    public $filter_term = null;
    public $terms = [];

    public function mount()
    {
        $this->branches = Branch::all();

        if ($this->branch_id) {
            $this->filter_branch = Branch::find($this->branch_id);
            $this->committees = Committee::where('branch_id', $this->branch_id)
                ->where('committee_type_id', 2)
                ->get();
        }

        if ($this->committee_id) {
            $this->filter_committee = Committee::find($this->committee_id);
            if ($this->filter_committee->committee_level_id < 3) {
                $this->terms = BranchTerm::where('active', true)
                    ->where('branch_id', $this->filter_committee->branch->id)
                    ->get();
            } else {
                $this->terms = SubBranchTerm::where('active', true)
                    ->where('sub_branch_id', $this->filter_committee->sub_branch->id)
                    ->get();
            }
        }

        if ($this->term_id) {
            if ($this->filter_committee->committee_level_id < 3) {
                $this->filter_term = BranchTerm::find($this->term_id);
            } else {
                $this->filter_term = SubBranchTerm::find($this->term_id);
            }
        }
    }

    public function resetFilter()
    {
        $this->reset(['branch_id', 'committee_id', 'term_id']);
        $this->filter_branch = null;
        $this->filter_committee = null;
        $this->committees = [];
        $this->filter_term = null;
        $this->terms = [];
    }

    public function removeFilter($filter)
    {
        if ($filter == 'branch') {
            $this->resetFilter();
        } elseif ($filter == 'committee') {
            $this->reset(['committee_id', 'term_id']);
            $this->filter_term = null;
            $this->terms = [];
            $this->filter_committee = null;
        } elseif ($filter == 'term') {
            $this->reset('term_id');
            $this->filter_term = null;
        }
    }

    public function updatedBranchId()
    {
        $this->filter_branch = Branch::find($this->branch_id);
        $this->reset(['committee_id', 'term_id']);
        $this->filter_committee = null;
        $this->filter_term = null;
        $this->terms = [];
        $this->filter_branch = Branch::find($this->branch_id);
        $this->committees = Committee::where('branch_id', $this->branch_id)
            ->where('committee_type_id', 2)
            ->get();
    }

    public function updatedCommitteeId()
    {
        $this->filter_committee = Committee::find($this->committee_id);
        $this->reset('term_id');
        $this->filter_term = null;
        $this->terms = [];
        if ($this->filter_committee->committee_level_id < 3) {
            $this->terms = BranchTerm::where('active', true)
                ->where('branch_id', $this->filter_committee->branch->id)
                ->get();
        } else {
            $this->terms = SubBranchTerm::where('active', true)
                ->where('sub_branch_id', $this->filter_committee->sub_branch->id)
                ->get();
        }
    }

    public function updatedTermId()
    {
        if ($this->filter_committee->committee_level_id < 3) {
            $this->filter_term = BranchTerm::find($this->term_id);
        } else {
            $this->filter_term = SubBranchTerm::find($this->term_id);
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
            ->where('committees.committee_type_id', 2)
            ->select(
                'members.kh_name as member_name',
                'members.member_position_order as member_position_order',
                'genders.kh_abbr as gender',
                'committee_member.gov_position as gov_position',
                'committee_positions.kh_name as committee_position',
                'branch_terms.kh_name as branch_term',
                'sub_branch_terms.kh_name as sub_branch_term'
            );

        if ($this->committee_id) {
            $query->where('committee_member.committee_id', $this->committee_id);
        }

        if ($this->term_id) {
            if ($this->filter_committee->committee_level_id < 3) {
                $query->where('committee_member.branch_term_id', $this->term_id);
            } else {
                $query->where('committee_member.sub_branch_term_id', $this->term_id);
            }
        }

        return view('livewire.report.committee-member-report', [
            'members' => $this->term_id ? $query->orderBy('members.member_position_order')->get() : []
        ]);
    }
}
