<?php

namespace App\Livewire\SubBranch;

use App\Models\SubBranch;
use App\Models\SubBranchTerm;
use Livewire\Component;

class SubBranchTermTable extends Component
{
    public SubBranch $sub_branch;

    public function mount(SubBranch $sub_branch)
    {
        $this->sub_branch = $sub_branch;
    }

    public function render()
    {
        return view('livewire.sub-branch.sub-branch-term-table', [
            'terms' => SubBranchTerm::where('sub_branch_id', $this->sub_branch->id)->get()
        ]);
    }
}
