<?php

namespace App\Livewire\SubBranch;

use App\Models\Branch;
use App\Models\SubBranch;
use Livewire\Attributes\On;
use Livewire\Component;

class SubBranchTable extends Component
{
    public $branch;

    public function mount(Branch $branch)
    {
        $this->branch = $branch;
    }

    #[On('confirmed_delete')]
    public function delete($sub_branch_id)
    {
        try {
            $sub_branch = SubBranch::find($sub_branch_id);
            if ($sub_branch) {
                $sub_branch->delete();
                $this->dispatch('delete_success');
            } else {
                $this->dispatch('delete_fail');
            }
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.sub-branch.sub-branch-table', [
            'sub_branches' => SubBranch::where('branch_id', $this->branch->id)->get()
        ]);
    }
}
