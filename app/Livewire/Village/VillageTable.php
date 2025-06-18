<?php

namespace App\Livewire\Village;

use App\Models\Commune;
use App\Models\Village;
use Livewire\Component;

class VillageTable extends Component
{
    public $commune;

    public function mount(Commune $commune)
    {
        $this->commune = $commune;
    }

    public function render()
    {
        return view('livewire.village.village-table', [
            'villages' => Village::where('commune_id', $this->commune->id)->get()
        ]);
    }
}
