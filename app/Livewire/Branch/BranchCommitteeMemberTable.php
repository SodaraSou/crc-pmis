<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use App\Models\BranchTerm;
use App\Models\Committee;
use App\Models\Member;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BranchCommitteeMemberTable extends Component
{
    use WithPagination;

    #[Url(except: 25)]
    public $per_page = 25;

    #[Url(except: '')]
    public $search = '';

    #[Url(except: '')]
    public $term_id = '';
    public $filter_term = null;

    public Branch $branch;
    public Committee $committee;
    public $current_term = null;

    public function mount(Branch $branch)
    {
        $this->branch = $branch->load([
            'committees' => function ($query) {
                $query->where('committee_type_id', 2);
            }
        ]);
        $this->committee = $this->branch->committees->first();
        $today = now()->toDateString();
        $this->current_term = BranchTerm::where('active', true)
            ->where('branch_id', $this->branch->id)
            ->where('start_date', "<=", $today)
            ->where('end_date',  ">=", $today)
            ->first();
        if ($this->current_term) {
            $this->term_id = $this->current_term->id;
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
                    ->whereHas('branch_term', function ($bt) {
                        $bt->where('branch_terms.active', true);
                    });
            });


        if ($this->search) {
            $query->where('kh_name', 'like', '%' . $this->search . '%');
        }

        if ($this->term_id) {
            $query->whereHas('committee_members', function ($cm) {
                $cm->where('active', true)
                    ->where('branch_term_id', $this->term_id);
            });
        }

        return view('livewire.branch.branch-committee-member-table', [
            'members' => $query->paginate($this->per_page),
            'terms' => BranchTerm::where('active', true)
                ->where('branch_id', $this->branch->id)->get(),
        ]);
    }
}
