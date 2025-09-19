<?php

namespace App\Livewire\Committee;

use App\Models\BranchTerm;
use App\Models\Committee;
use App\Models\CommitteeLevel;
use App\Models\CommitteeMember;
use App\Models\Member;
use App\Models\SubBranchTerm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CommitteeMemberTable extends Component
{
    use WithPagination;

    public $user = null;

    #[Url(except: '')]
    public $search = "";

    public $active_term = false;

    #[Url(except: '')]
    public $committee_level_id = '';
    public $filter_committee_level = null;

    public $committees = [];
    #[Url(except: '')]
    public $committee_id = '';
    public $filter_committee = null;

    public $terms = [];
    #[Url(except: '')]
    public $term_id = '';
    public $filter_term = null;

    public $per_page = 25;

    public function mount()
    {
        $this->user = Auth::user();


        if ($this->committee_level_id) {
            $this->filter_committee_level = CommitteeLevel::find($this->committee_level_id);
            $this->committees = Committee::where('active', true)
                ->where('committee_level_id', $this->committee_level_id)
                ->where('committee_type_id', 2)
                ->get();
        }

        if ($this->committee_id) {
            $this->filter_committee = Committee::find($this->committee_id);
            if ($this->committee_level_id == 1 && $this->filter_committee) {
                $this->terms = BranchTerm::where('active', true)
                    ->where('branch_id', $this->filter_committee->branch_id)
                    ->get();
            } elseif ($this->committee_level_id == 2 && $this->filter_committee) {
                $this->terms = SubBranchTerm::where('active', true)
                    ->where('sub_branch_id', $this->filter_committee->sub_branch_id)
                    ->get();
            }
        }

        if ($this->term_id) {
            if ($this->committee_level_id == 1) {
                $this->filter_term = BranchTerm::find($this->term_id);
            } elseif ($this->committee_level_id == 2) {
                $this->filter_term = SubBranchTerm::find($this->term_id);
            }
        }
    }


    public function resetFilter(): void
    {
        $this->reset('search', 'committee_level_id', 'committee_id', 'term_id');
        $this->per_page = 25;
        $this->filter_committee_level = null;
        $this->filter_committee = null;
        $this->filter_term = null;
    }

    public function updatedCommitteeLevelId()
    {
        $this->committees = Committee::where('active', true)
            ->where('committee_level_id', $this->committee_level_id)
            ->where('committee_type_id', 2)
            ->get();
        $this->filter_committee_level = CommitteeLevel::find($this->committee_level_id);
    }

    public function updatedCommitteeId()
    {
        $committee = Committee::where('active', true)
            ->where('id', $this->committee_id)
            ->first();
        $this->filter_committee = $committee;
        if ($this->committee_level_id == 1) {
            $this->terms = BranchTerm::where('active', true)
                ->where('branch_id', $committee->branch->id)
                ->get();
        } elseif ($this->committee_level_id == 2) {
            $this->terms = SubBranchTerm::where('active', true)
                ->where('sub_branch_id', $committee->sub_branch->id)
                ->get();
        }
    }

    #[On('confirmed_delete')]
    public function delete($member_id)
    {
        try {
            $member = Member::where('id', $member_id)->first();

            $member->update([
                'active' => false,
                'updated_by' => $this->user->id
            ]);

            CommitteeMember::where('active', true)
                ->where('member_id', $member_id)
                ->update([
                    'active' => false,
                    'updated_by' => $this->user->id
                ]);

            $this->dispatch('delete_success');
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        $query = Member::query();

        $query->where('active', true)
            ->whereHas('committees', function ($q) {
                $q->where('committee_type_id', 2);
            });


        if ($this->search) {
            $query->where('kh_name', 'like', '%' . $this->search . '%');
        }

        if ($this->committee_level_id) {
            $this->filter_committee_level = CommitteeLevel::find($this->committee_level_id);
            $query->whereHas('committee_members', function ($cm) {
                $cm->where('committee_member.active', true)
                    ->whereHas('committee', function ($c) {
                        $c->where('committees.active', true)
                            ->where('committee_level_id', $this->committee_level_id);
                    });
            });
        }

        if ($this->committee_id) {
            $query->whereHas('committee_members', function ($cm) {
                $cm->where('active', true)
                    ->where('committee_id', $this->committee_id);
            });
        }

        if ($this->term_id) {
            if ($this->committee_level_id == 1) {
                $query->whereHas('committee_members', function ($cm) {
                    $cm->where('active', true)
                        ->where('branch_term_id', $this->term_id);
                });
                $this->filter_term = BranchTerm::find($this->term_id);
            } elseif ($this->committee_level_id == 2) {
                $query->whereHas('committee_members', function ($cm) {
                    $cm->where('active', true)
                        ->where('sub_branch_term_id', $this->term_id);
                });
                $this->filter_term = SubBranchTerm::find($this->term_id);
            }
        }

        return view('livewire.committee.committee-member-table', [
            'members' => $query->paginate($this->per_page),
            'committee_levels' => CommitteeLevel::all(),
        ]);
    }
}
