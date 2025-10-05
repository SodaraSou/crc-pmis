<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
// use Livewire\Attributes\On;
use Livewire\Component;

class BranchTable extends Component
{
    // #[On('confirmed_delete')]
    // public function delete($branch_id)
    // {
    //     try {
    //         $branch = Branch::find($branch_id);
    //         if ($branch) {
    //             $branch->delete();
    //             $this->dispatch('delete_success');
    //         } else {
    //             $this->dispatch('delete_fail');
    //         }
    //     } catch (\Exception $e) {
    //         $this->dispatch('delete_fail', message: $e->getMessage());
    //     }
    // }

    public function render()
    {
        return view('livewire.branch.branch-table', [
            'branches' => Branch::orderBy('id')->get()
        ]);
    }
}
