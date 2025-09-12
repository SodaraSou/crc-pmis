<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use App\Models\Committee;
use Livewire\Component;

class BranchHonoraryCommitteeMemberTable extends Component
{
    public Branch $branch;
    public Committee $committee;
    public $members = [];

    public function mount(Branch $branch)
    {
        $this->branch = $branch->load([
            'committees' => function ($query) {
                $query->where('committee_type_id', 1);
            }
        ]);
        $this->committee = $this->branch->committees->first();
        $this->members = $this->committee->members;
    }

    public function render()
    {
        return view('livewire.branch.branch-honorary-committee-member-table');
    }
}
