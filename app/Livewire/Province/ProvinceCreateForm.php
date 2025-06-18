<?php

namespace App\Livewire\Province;

use App\Models\Province;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProvinceCreateForm extends Component
{
    #[Validate('required', message: "សូមបញ្ចូលលេខកូដ")]
    public $code = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខេត្តខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខេត្តឡាតាំង")]
    public $en_name = "";

    public function save()
    {
        $validated = $this->validate();
        try {
            Province::create([
                'id' => $validated['code'],
                'kh_name' => $validated['kh_name'],
                'en_name' => $validated['en_name']
            ]);
            return redirect()->to('/province');
        } catch (\Exception $ex) {
            $this->dispatch('create_fail');
        }
    }

    public function render()
    {
        return view('livewire.province.province-create-form');
    }
}
