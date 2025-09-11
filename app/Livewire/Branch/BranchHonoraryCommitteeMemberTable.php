<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use Livewire\Component;

class BranchHonoraryCommitteeMemberTable extends Component
{
    public Branch $branch;

    public function mount(Branch $branch)
    {
        $this->branch = $branch;
    }

    public function render()
    {
        return view('livewire.branch.branch-honorary-committee-member-table', [
            'members' => $this->branch
        ]);
    }
}
