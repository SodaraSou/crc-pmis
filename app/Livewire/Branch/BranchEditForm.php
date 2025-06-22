<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use App\Models\Province;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BranchEditForm extends Component
{
    public $branch;
    #[Validate('required', message: "សូមជ្រើសរើសរាជធានី/ខេត្ត")]
    public $province_id = "";

    public function mount(Branch $branch)
    {
        $this->branch = $branch;
        $this->province_id = $branch->province_id;
    }

    public function save()
    {
        $this->validate();
        try {
            $province = Province::find($this->province_id);
            $this->branch->update([
                'en_name' => $province->en_name,
                'kh_name' => $province->kh_name,
                'province_id' => $this->province_id,
            ]);
            return redirect()->to('/branch');
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.branch.branch-edit-form', [
            'provinces' => Province::all()
        ]);
    }
}
