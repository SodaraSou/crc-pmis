<?php

namespace App\Livewire\Term;

use App\Models\Branch;
use App\Models\CommitteeMember;
use App\Models\SubBranch;
use App\Models\SubBranchTerm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SubBranchTermTable extends Component
{
    use WithPagination;

    public $user = null;

    public $per_page = 25;

    public $sub_branches = [];

    #[Url(except: '')]
    public $search = '';

    #[Url(except: '')]
    public $branch_id = '';
    public $filter_branch = null;

    #[Url(except: '')]
    public $sub_branch_id = '';
    public $filter_sub_branch = null;

    public function mount()
    {
        $this->user = Auth::user();
        if ($this->branch_id) {
            $this->sub_branches = SubBranch::where('active', true)
                ->where('branch_id', $this->branch_id)
                ->get();
        }
    }

    public function resetFilter(): void
    {
        $this->reset('search', 'branch_id', 'sub_branch_id');
        $this->per_page = 25;
        $this->filter_branch = null;
        $this->filter_sub_branch = null;
    }

    public function removeFilter($filter): void
    {
        if ($filter == 'branch') {
            $this->branch_id = '';
            $this->filter_branch = null;
            $this->sub_branch_id = '';
            $this->filter_sub_branch = null;
            $this->sub_branches = [];
        } elseif ($filter == 'sub_branch') {
            $this->sub_branch_id = '';
            $this->filter_sub_branch = null;
        }
    }

    public function updatedBranchId()
    {
        $this->sub_branches = SubBranch::where('active', true)
            ->where('branch_id', $this->branch_id)
            ->get();
    }

    #[On('confirmed_delete_sub_branch_term')]
    public function delete($term_id)
    {
        try {
            $committee_member = CommitteeMember::where('branch_term_id', $term_id)->first();

            if ($committee_member) {
                $this->dispatch('delete_fail', message: 'មិនអាចលុបបាន');
                return;
            }

            $term = SubBranchTerm::where('id', $term_id)->first();

            $term->update([
                'active' => false,
            ]);

            $this->dispatch('delete_success');
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        $query = SubBranchTerm::query();

        $query->where('active', true);

        if ($this->search) {
            $query->where('kh_name', 'like', '%' . $this->search . '%');
        }

        if ($this->branch_id) {
            $this->filter_branch = Branch::find($this->branch_id);
        }

        if ($this->sub_branch_id) {
            $query->where('sub_branch_id', $this->sub_branch_id);
            $this->filter_sub_branch = SubBranch::find($this->sub_branch_id);
        }

        return view('livewire.term.sub-branch-term-table', [
            'terms' => $query->paginate($this->per_page),
            'branches' => Branch::all(),
        ]);
    }
}
