<?php

namespace App\Livewire\District;

use App\Models\District;
use App\Models\Province;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DistrictEditForm extends Component
{
    public $district;
    public $province_id;
    #[Validate('required', message: "សូមបញ្ចូលលេខកូដ")]
    public $code = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខេត្តខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខេត្តឡាតាំង")]
    public $en_name = "";

    public function mount(District $district)
    {
        $this->district = $district;
        $this->province_id = $district->province->id;
        $this->code = $district->id;
        $this->kh_name = $district->kh_name;
        $this->en_name = $district->en_name;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->district->update([
                'id' => $validated['code'],
                'kh_name' => $validated['kh_name'],
                'en_name' => $validated['en_name'],
                'province_id' => $this->province_id
            ]);
            return redirect()->to("/province/{$this->province_id}");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.district.district-edit-form', [
            'provinces' => Province::all()
        ]);
    }
}
