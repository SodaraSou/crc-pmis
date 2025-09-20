<?php

namespace App\Livewire\Term;

use App\Models\Branch;
use App\Models\BranchTerm;
use Illuminate\Support\Facades\Auth;
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
