<?php

namespace App\Livewire\SubBranch;

use App\Models\Branch;
use App\Models\District;
use App\Models\SubBranch;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SubBranchEditForm extends Component
{
    public $sub_branch;
    public $branch_id;
    #[Validate('required', message: "សូមជ្រើសរើសស្រុក/ខណ្ឌ")]
    public $district_id = "";

    public function mount(SubBranch $sub_branch)
    {
        $this->sub_branch = $sub_branch;
        $this->branch_id = $sub_branch->branch_id;
        $this->district_id = $sub_branch->district_id;
    }

    public function save()
    {
        $this->validate();
        try {
            $district = District::find($this->district_id);
            $this->sub_branch->update([
                'en_name' => $district->en_name,
                'kh_name' => $district->kh_name,
                'branch_id' => $this->branch_id,
                'district_id' => $this->district_id,
            ]);
            return redirect()->to("/branch/{$this->branch_id}");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.sub-branch.sub-branch-edit-form', [
            'branches' => Branch::all(),
            'districts' => District::where('province_id', $this->sub_branch->branch->province->id)->get()
        ]);
    }
}
