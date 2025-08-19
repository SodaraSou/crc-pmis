<?php

namespace App\Livewire\Committee;

use App\Models\Branch;
use App\Models\Committee;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CommitteeEditForm extends Component
{
    public $committee;

    public $en_name = "";
    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះគណៈកម្មាធិការខ្មែរ')]
    public $kh_name = "";
    #[Validate('required', message: 'សូមជ្រើសរើសសាខា')]
    public $branch_id = "";

    public function mount(Committee $committee)
    {
        $this->committee = $committee;
        $this->en_name = $committee->en_name;
        $this->kh_name = $committee->kh_name;
        $this->branch_id = $committee->branch_id;
    }

    public function save()
    {
        $this->validate();
        try{
            $this->committee->update([
                'en_name' => $this->en_name,
                'kh_name' => $this->kh_name,
                'branch_id' => $this->branch_id,
            ]);
            session()->flash('toast', [
                'type' => 'success',
                'message' => 'គណៈកម្មាធិការបានកែប្រែដោយជោគជ័យ!'
            ]);
            return redirect()->to('/committee');
        } catch (\Exception $ex) {
            $this->dispatch('update_fail', message: $ex->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.committee.committee-edit-form', [
            'branches' => Branch::all(),
        ]);
    }
}
