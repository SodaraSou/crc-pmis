<?php

namespace App\Livewire\Committee;

use App\Models\Branch;
use App\Models\Committee;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CommitteeCreateForm extends Component
{
    public $en_name = "";
    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះគណៈកម្មាធិការខ្មែរ')]
    public $kh_name = "";
    #[Validate('required', message: 'សូមជ្រើសរើសសាខា')]
    public $branch_id = "";

    public function render()
    {
        return view('livewire.committee.committee-create-form', [
            'branches' => Branch::all(),
        ]);
    }

    public function save()
    {
        $this->validate();
        try {
            Committee::create([
                'en_name' => $this->en_name,
                'kh_name' => $this->kh_name,
                'branch_id' => $this->branch_id,
            ]);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'គណៈកម្មាធិការបានបង្កើតដោយជោគជ័យ!'
            ]);

            return redirect()->to('/committee');
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }
}
