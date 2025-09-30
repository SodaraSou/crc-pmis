<?php

namespace App\Livewire\Commune;

use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CommuneEditForm extends Component
{
    public $commune;
    public $province_id;
    public $district_id;
    #[Validate('required', message: "សូមបញ្ចូលលេខកូដ")]
    public $code = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះឃុំ/សង្កាត់ខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះឃុំ/សង្កាត់ឡាតាំង")]
    public $en_name = "";

    public function mount(Commune $commune)
    {
        $this->commune = $commune;
        $this->province_id = $commune->district->province->id;
        $this->district_id = $commune->district_id;
        $this->code = $commune->id;
        $this->kh_name = $commune->kh_name;
        $this->en_name = $commune->en_name;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->commune->update([
                'id' => $validated['code'],
                'kh_name' => $validated['kh_name'],
                'en_name' => $validated['en_name'],
                'district_id' => $this->district_id
            ]);
            
            return redirect()->to("/district/{$this->district_id}");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.commune.commune-edit-form', [
            'provinces' => Province::all(),
            'districts' => District::where('province_id', $this->province_id)->get()
        ]);
    }
}
