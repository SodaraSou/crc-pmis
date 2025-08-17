<?php

namespace App\Livewire\Committee;

use Livewire\Component;
use App\Models\Committee;

class CommitteeTable extends Component
{
    public function render()
    {
        return view('livewire.committee.committee-table',
        [
            'committees' => Committee::all()
        ]);
    }
}
