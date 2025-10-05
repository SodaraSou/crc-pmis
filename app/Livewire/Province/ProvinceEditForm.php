<?php

namespace App\Livewire\Province;

use App\Models\Province;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProvinceEditForm extends Component
{
    public $province;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះឡាតាំង")]
    public $en_name = "";

    public function mount(Province $province)
    {
        $this->province = $province;
        $this->kh_name = $province->kh_name;
        $this->en_name = $province->en_name;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->province->update([
                'kh_name' => $validated['kh_name'],
                'en_name' => $validated['en_name']
            ]);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'ខេត្តកែប្រែដោយជោគជ័យ!'
            ]);

            return redirect()->to("/province/$this->province->id");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.province.province-edit-form');
    }
}
