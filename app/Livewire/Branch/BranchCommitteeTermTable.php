<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use Livewire\Component;

class BranchCommitteeTermTable extends Component
{
    public Branch $branch;

    public function mount(Branch $branch)
    {
        $this->branch = $branch;
    }

    public function render()
    {
        return view('livewire.branch.branch-committee-term-table', [
            'terms' => $this->branch->terms
        ]);
    }
}
