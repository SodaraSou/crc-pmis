<?php

namespace App\Livewire\SubBranch;

use App\Models\Branch;
use App\Models\SubBranch;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class SubBranchTable extends Component
{
    public $user = null;
    public $branch = null;
    public $sub_branches = [];

    public function mount(Branch $branch)
    {
        $this->user = Auth::user();
        if ($branch) {
            $this->branch = $branch;
            $this->sub_branches = SubBranch::where('branch_id', $this->branch->id)->orderBy('id')->get();
        }

        if ($this->user->hasRole('Branch System Operator')) {
            $this->sub_branches = SubBranch::where('branch_id', $this->user->branch_id)->get();
        }
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
        return view('livewire.sub-branch.sub-branch-table');
    }
}
