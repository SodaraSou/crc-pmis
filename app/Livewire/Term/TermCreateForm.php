<?php

namespace App\Livewire\Term;

use App\Models\Term;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Committee;

class TermCreateForm extends Component
{
    public $committee;
    public $committee_id;

    public $en_name = "";
    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះអាណត្តិខ្មែរ')]
    public $kh_name = "";

    public function mount(Committee $committee)
    {
        $this->committee = $committee;
        $this->committee_id = $committee->id;
    }

    public function save()
    {
        $this->validate();
        try{
            Term::create([
                'en_name' => $this->en_name,
                'kh_name' => $this->kh_name,
                'committee_id' => $this->committee_id,
            ]);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'អាណត្តិបានបង្កើតដោយជោគជ័យ!'
            ]);

            return redirect()->to("/committee/{$this->committee_id}");
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.term.term-create-form', [
            'committees' => Committee::all(),
        ]);
    }
}
