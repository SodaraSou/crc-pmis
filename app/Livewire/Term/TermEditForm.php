<?php

namespace App\Livewire\Term;

use Livewire\Attributes\Validate;
use Livewire\Component;

class TermEditForm extends Component
{
    public $en_name = null;

    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខ្មែរ")]
    public $kh_name = null;

    public $start_date = null;

    public $end_date = null;

    public function render()
    {
        return view('livewire.term.term-edit-form');
    }
}
