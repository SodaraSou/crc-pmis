<?php

namespace App\Livewire\Village;

use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Livewire\Attributes\Validate;
use Livewire\Component;

class VillageEditForm extends Component
{
    public $village;
    public $province_id;
    public $district_id;
    public $commune_id;
    #[Validate('required', message: "សូមបញ្ចូលលេខកូដ")]
    public $code = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះភូមិខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះភូមិឡាតាំង")]
    public $en_name = "";

    public function mount(Village $village)
    {
        $this->village = $village;
        $this->province_id = $village->commune->district->province->id;
        $this->district_id = $village->commune->district->id;
        $this->commune_id = $village->commune->id;
        $this->code = $village->id;
        $this->kh_name = $village->kh_name;
        $this->en_name = $village->en_name;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->village->update([
                'id' => $validated['code'],
                'kh_name' => $validated['kh_name'],
                'en_name' => $validated['en_name'],
                'commune_id' => $this->commune_id
            ]);
            return redirect()->to("/commune/{$this->commune_id}");
        } catch (\Exception $ex) {
            $this->dispatch('create_fail');
        }
    }

    public function render()
    {
        return view('livewire.village.village-edit-form', [
            'provinces' => Province::all(),
            'districts' => District::where('province_id', $this->province_id)->get(),
            'communes' => Commune::where('district_id', $this->district_id)->get(),
        ]);
    }
}
