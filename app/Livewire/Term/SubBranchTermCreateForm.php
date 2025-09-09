<?php

namespace App\Livewire\Term;

use App\Models\SubBranchTerm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SubBranchTermCreateForm extends Component
{
    public $user = null;

    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខ្មែរ")]
    public $kh_name = null;

    public $en_name = null;

    public $start_date = null;

    public $end_date = null;

    public function save()
    {
        $this->validate();
        try {
            SubBranchTerm::create([
                'kh_name' => $this->kh_name,
                'en_name' => $this->en_name,
                'sub_branch_id' => Auth::user()->sub_branch_id,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
            ]);
            session()->flash('toast', [
                'type' => 'success',
                'message' => 'អាណត្តិបានបង្កើតដោយជោគជ័យ!'
            ]);

            return redirect()->to("/term");
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.term.sub-branch-term-create-form');
    }
}
