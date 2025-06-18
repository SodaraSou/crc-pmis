<?php

namespace App\Livewire\District;

use App\Models\District;
use App\Models\Province;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DistrictCreateForm extends Component
{
    public $province;
    public $province_id;
    #[Validate('required', message: "សូមបញ្ចូលលេខកូដ")]
    public $code = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខេត្តខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខេត្តឡាតាំង")]
    public $en_name = "";

    public function mount(Province $province)
    {
        $this->province = $province;
        $this->province_id = $province->id;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            District::create([
                'id' => $validated['code'],
                'kh_name' => $validated['kh_name'],
                'en_name' => $validated['en_name'],
                'province_id' => $this->province_id
            ]);
            return redirect()->to("/province/{$this->province_id}");
        } catch (\Exception $ex) {
            $this->dispatch('create_fail');
        }
    }

    public function render()
    {
        return view('livewire.district.district-create-form', [
            'provinces' => Province::all()
        ]);
    }
}
