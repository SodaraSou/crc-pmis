<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use App\Models\Committee;
use Livewire\Component;

class BranchCommitteeTermTable extends Component
{
    public Branch $branch;
    public Committee $committee;

    public function mount(Branch $branch)
    {
        $this->branch = $branch;
        $this->committee = Committee::where('branch_id', $this->branch->id)->first();
    }

    public function render()
    {
        return view('livewire.branch.branch-committee-term-table', [
            'terms' => []
        ]);
    }
}
