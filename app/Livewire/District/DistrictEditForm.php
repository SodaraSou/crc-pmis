<?php

namespace App\Livewire\District;

use App\Models\District;
use App\Models\Province;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DistrictEditForm extends Component
{
    public $district;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះឡាតាំង")]
    public $en_name = "";

    public function mount(District $district)
    {
        $this->district = $district;
        $this->kh_name = $district->kh_name;
        $this->en_name = $district->en_name;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->district->update([
                'kh_name' => $validated['kh_name'],
                'en_name' => $validated['en_name'],
            ]);
            return redirect()->to("/district/$this->district->id");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.district.district-edit-form');
    }
}
