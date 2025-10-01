<?php

namespace App\Livewire\Term;

use App\Models\Branch;
use App\Models\BranchTerm;
use App\Models\CommitteeMember;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BranchTermTable extends Component
{
    use WithPagination;

    public $user = null;

    public $per_page = 25;

    #[Url(except: '')]
    public $search = "";

    #[Url(except: '')]
    public $branch_id = '';
    public $filter_branch = null;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function resetFilter(): void
    {
        $this->reset('search', 'branch_id');
        $this->per_page = 25;
        $this->filter_branch = null;
    }

    public function removeFilter($filter): void
    {
        if ($filter == 'branch') {
            $this->branch_id = '';
            $this->filter_branch = null;
        }
    }

    #[On('confirmed_delete_branch_term')]
    public function delete($term_id)
    {
        try {
            $committee_member = CommitteeMember::where('branch_term_id', $term_id)->first();

            if ($committee_member) {
                $this->dispatch('delete_fail', message: 'មិនអាចលុបបាន');
                return;
            }

            $term = BranchTerm::where('id', $term_id)->first();

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
        $query = BranchTerm::query();

        $query->where('active', true);

        if ($this->search) {
            $query->where('kh_name', 'like', '%' . $this->search . '%');
        }

        if ($this->branch_id) {
            $query->where('branch_id', $this->branch_id);
            $this->filter_branch = Branch::find($this->branch_id);
        }

        return view('livewire.term.branch-term-table', [
            'terms' => $query->paginate($this->per_page),
            'branches' => Branch::all()
        ]);
    }
}
