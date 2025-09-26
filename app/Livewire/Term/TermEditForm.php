<?php

namespace App\Livewire\Term;

use App\Models\BranchTerm;
use App\Models\SubBranchTerm;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TermEditForm extends Component
{
    public BranchTerm $branch_term;

    public SubBranchTerm $sub_branch_term;

    public $is_branch = false;

    public $en_name = null;

    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខ្មែរ")]
    public $kh_name = null;

    public $start_date = null;

    public $end_date = null;

    public function mount($is_branch, $term)
    {
        $this->is_branch = $is_branch;
        if ($this->is_branch) {
            $this->branch_term = $term;
        } else {
            $this->sub_branch_term = $term;
        }
        $this->en_name = $term->en_name;
        $this->kh_name = $term->kh_name;
        $this->start_date = $term->start_date;
        $this->end_date = $term->end_date;
    }

    public function save()
    {
        try {
            if ($this->is_branch) {
                $this->branch_term->update([
                    'en_name' => $this->en_name,
                    'kh_name' => $this->kh_name,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                ]);
            } else {
                $this->sub_branch_term->update([
                    'en_name' => $this->en_name,
                    'kh_name' => $this->kh_name,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                ]);
            }

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'អាណត្តិបានកែប្រែដោយជោគជ័យ!'
            ]);

            return redirect()->to('/term');
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.term.term-edit-form');
    }
}
