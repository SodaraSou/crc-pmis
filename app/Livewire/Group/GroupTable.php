<?php

namespace App\Livewire\Group;

use App\Models\Group;
use App\Models\SubBranch;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class GroupTable extends Component
{
    public SubBranch $sub_branch;

    public function mount(SubBranch $sub_branch): void
    {
        $this->sub_branch = $sub_branch;
    }

    #[On('confirmed_delete')]
    public function delete($group_id): void
    {
        try {
            $group = Group::find($group_id);
            if ($group) {
                $group->delete();
                $this->dispatch('delete_success');
            } else {
                $this->dispatch('delete_fail');
            }
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.group.group-table', [
            'groups' => Group::where('sub_branch_id', $this->sub_branch->id)->get(),
        ]);
    }
}
