<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use App\Models\Province;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BranchCreateForm extends Component
{
    #[Validate('required', message: 'សូមជ្រើសរើសរាជធានី/ខេត្ត')]
    public $province_id = '';

    public function save()
    {
        $this->validate();
        try {
            $province = Province::find($this->province_id);
            Branch::create([
                'en_name' => $province->en_name,
                'kh_name' => $province->kh_name,
                'province_id' => $this->province_id,
            ]);

            return redirect()->to('/branch');
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.branch.branch-create-form', [
            'provinces' => Province::all(),
        ]);
    }
}
