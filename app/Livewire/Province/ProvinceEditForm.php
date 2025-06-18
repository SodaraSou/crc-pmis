<?php

namespace App\Livewire\Province;

use App\Models\Province;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProvinceEditForm extends Component
{
    public $province;
    #[Validate('required', message: "សូមបញ្ចូលលេខកូដ")]
    public $code = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខេត្តខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខេត្តឡាតាំង")]
    public $en_name = "";

    public function mount(Province $province)
    {
        $this->province = $province;
        $this->code = $province->id;
        $this->kh_name = $province->kh_name;
        $this->en_name = $province->en_name;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->province->update([
                'id' => $validated['code'],
                'kh_name' => $validated['kh_name'],
                'en_name' => $validated['en_name']
            ]);
            return redirect()->to('/province');
        } catch (\Exception $e) {
            $this->dispatch('update_fail');
        }
    }

    public function render()
    {
        return view('livewire.province.province-edit-form');
    }
}
