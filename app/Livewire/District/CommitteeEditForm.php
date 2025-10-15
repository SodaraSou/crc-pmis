<?php

namespace App\Livewire\District;

use App\Models\Committee;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CommitteeEditForm extends Component
{
    public $committee;
    public $district_id;

    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះឡាតាំង")]
    public $en_name = "";

    public function mount(Committee $committee, $district_id)
    {
        $this->committee = $committee;
        $this->district_id = $district_id;
        $this->kh_name = $committee->kh_name;
        $this->en_name = $committee->en_name;
    }

    public function save()
    {
        $this->validate();
        try {
            $this->committee->update([
                'kh_name' => $this->kh_name,
                'en_name' => $this->en_name,
            ]);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'គណ:កម្មាធិការកែប្រែដោយជោគជ័យ!'
            ]);

            return redirect()->to("/district/$this->district_id");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.district.committee-edit-form');
    }
}
