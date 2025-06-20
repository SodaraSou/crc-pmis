<?php

namespace App\Livewire\Village;

use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Livewire\Attributes\Validate;
use Livewire\Component;

class VillageCreateForm extends Component
{
    public $commune;
    public $province_id;
    public $district_id;
    public $commune_id;
    #[Validate('required', message: "សូមបញ្ចូលលេខកូដ")]
    public $code = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះភូមិខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះភូមិឡាតាំង")]
    public $en_name = "";

    public function mount(Commune $commune)
    {
        $this->commune = $commune;
        $this->province_id = $commune->district->province->id;
        $this->district_id = $commune->district->id;
        $this->commune_id = $commune->id;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            Village::create([
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
        return view('livewire.village.village-create-form', [
            'provinces' => Province::all(),
            'districts' => District::where('province_id', $this->province_id)->get(),
            'communes' => Commune::where('district_id', $this->district_id)->get(),
        ]);
    }
}
