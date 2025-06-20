<?php

namespace App\Livewire\Commune;

use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CommuneCreateForm extends Component
{
    public $district;
    public $province_id;
    public $district_id;
    #[Validate('required', message: "សូមបញ្ចូលលេខកូដ")]
    public $code = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះឃុំ/សង្កាត់ខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះឃុំ/សង្កាត់ឡាតាំង")]
    public $en_name = "";

    public function mount(District $district)
    {
        $this->district = $district;
        $this->province_id = $district->province->id;
        $this->district_id = $district->id;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            Commune::create([
                'id' => $validated['code'],
                'kh_name' => $validated['kh_name'],
                'en_name' => $validated['en_name'],
                'district_id' => $this->district_id
            ]);
            return redirect()->to("/district/{$this->district_id}");
        } catch (\Exception $ex) {
            $this->dispatch('create_fail');
        }
    }

    public function render()
    {
        return view('livewire.commune.commune-create-form', [
            'provinces' => Province::all(),
            'districts' => District::where('province_id', $this->province_id)->get()
        ]);
    }
}
