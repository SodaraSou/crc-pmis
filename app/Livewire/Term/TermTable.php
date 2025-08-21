<?php

namespace App\Livewire\Term;

use Livewire\Component;
use App\Models\Committee;
use App\Models\Term;

class TermTable extends Component
{
    public $committee;

    public function mount(Committee $committee)
    {
        $this->committee = $committee;
    }

    public function render()
    {
        return view('livewire.term.term-table', [
            'terms' => Term::where('committee_id', $this->committee->id)->get()
        ]);
    }
}
