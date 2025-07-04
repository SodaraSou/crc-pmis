<?php

namespace App\Livewire\Group;

use App\Models\Commune;
use App\Models\Group;
use App\Models\SubBranch;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class GroupCreateForm extends Component
{
    public SubBranch $sub_branch;

    public $sub_branch_id;

    #[Validate('required', message: 'សូមជ្រើសរើសឃុំ/សង្កាត់')]
    public $commune_id = null;

    public function mount(SubBranch $sub_branch): void
    {
        $this->sub_branch = $sub_branch;
        $this->sub_branch_id = $sub_branch->id;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $commune = Commune::find($this->commune_id);
            Group::create([
                'en_name' => $commune->en_name,
                'kh_name' => $commune->kh_name,
                'sub_branch_id' => $this->sub_branch_id,
                'commune_id_id' => $validated['commune_id'],
            ]);

            return redirect()->to("/sub-branch/{$this->sub_branch_id}");
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.group.group-create-form', [
            'sub_branches' => SubBranch::where('branch_id', $this->sub_branch->branch_id)->get(),
            'communes' => Commune::where('district_id', $this->sub_branch->district_id)->get(),
        ]);
    }
}
