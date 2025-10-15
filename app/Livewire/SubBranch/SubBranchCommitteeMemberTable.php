<?php

namespace App\Livewire\SubBranch;

use App\Models\Committee;
use App\Models\Member;
use App\Models\SubBranch;
use App\Models\SubBranchTerm;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SubBranchCommitteeMemberTable extends Component
{
    use WithPagination;

    #[Url(except: 25)]
    public $per_page = 25;

    #[Url(except: '')]
    public $search = '';

    #[Url(except: '')]
    public $term_id = '';
    public $filter_term = null;

    public SubBranch $sub_branch;
    public Committee $committee;

    public function mount(SubBranch $sub_branch)
    {
        $this->sub_branch = $sub_branch->load([
            'committees' => function ($c) {
                $c->where('committee_type_id', 2);
            }
        ]);
        $this->committee = $this->sub_branch->committees->first();
        if ($this->sub_branch->current_term) {
            $this->term_id = $this->sub_branch->current_term->id;
        }
    }

    public function render()
    {
        $query = Member::query();

        $query->where('active', true)
            ->whereHas('committees', function ($q) {
                $q->where('committees.active', true)
                    ->where('committees.id', $this->committee->id);
            })
            ->whereHas('committee_members', function ($cm) {
                $cm->where('committee_member.active', true)
                    ->whereHas('sub_branch_term', function ($sbt) {
                        $sbt->where('sub_branch_terms.active', true);
                    });
            })
            ->with(['current_membership']);


        if ($this->search) {
            $query->where('kh_name', 'like', '%' . $this->search . '%');
        }

        if ($this->term_id) {
            $query->whereHas('committee_members', function ($cm) {
                $cm->where('active', true)
                    ->where('sub_branch_term_id', $this->term_id);
            });
        }

        return view('livewire.sub-branch.sub-branch-committee-member-table', [
            'members' => $query->paginate($this->per_page),
            'terms' => SubBranchTerm::where('active', true)
                ->where('sub_branch_id', $this->sub_branch->id)->get(),
        ]);
    }
}
