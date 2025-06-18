<?php

namespace App\Livewire\Commune;

use App\Models\Commune;
use App\Models\District;
use Livewire\Component;

class CommuneTable extends Component
{
    public $district;

    public function mount(District $district)
    {
        $this->district = $district;
    }

    public function render()
    {
        return view('livewire.commune.commune-table', [
            'communes' => Commune::where('district_id', $this->district->id)->get()
        ]);
    }
}
