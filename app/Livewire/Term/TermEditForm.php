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

    public $en_name = null;

    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខ្មែរ")]
    public $kh_name = null;

    public $start_date = null;

    public $end_date = null;

    public function mount(BranchTerm $branch_term, SubBranchTerm $sub_branch_term)
    {
        if ($branch_term) {
            $this->branch_term = $branch_term;
            $this->en_name = $branch_term->en_name;
            $this->kh_name = $branch_term->kh_name;
            $this->start_date = $branch_term->start_date;
            $this->end_date = $branch_term->end_date;
        } elseif ($sub_branch_term) {
            $this->sub_branch_term = $sub_branch_term;
            $this->en_name = $sub_branch_term->en_name;
            $this->kh_name = $sub_branch_term->kh_name;
        }
    }

    public function save() {}

    public function render()
    {
        return view('livewire.term.term-edit-form');
    }
}
