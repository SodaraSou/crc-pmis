<?php

namespace App\Livewire\Province;

use App\Models\Committee;
use Livewire\Attributes\Validate;
use Livewire\Component;

class HonoraryCommitteeEditForm extends Component
{
    public $committee;
    public $province_id;

    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខេត្តខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខេត្តឡាតាំង")]
    public $en_name = "";

    public function mount(Committee $committee, $province_id)
    {
        $this->committee = $committee;
        $this->province_id = $province_id;
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
                'message' => 'គណ:កិត្តិយសកែប្រែដោយជោគជ័យ!'
            ]);

            return redirect()->to("/province/$this->province_id");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.province.honorary-committee-edit-form');
    }
}
