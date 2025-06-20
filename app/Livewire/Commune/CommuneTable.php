<?php

namespace App\Livewire\Commune;

use App\Models\Commune;
use App\Models\District;
use Livewire\Attributes\On;
use Livewire\Component;

class CommuneTable extends Component
{
    public $district;

    public function mount(District $district)
    {
        $this->district = $district;
    }

    #[On('confirmed_delete')]
    public function delete($commune_id)
    {
        try {
            $commune = Commune::find($commune_id);
            if ($commune) {
                $commune->delete();
                $this->dispatch('delete_success');
            } else {
                $this->dispatch('delete_fail');
            }
        } catch (\Exception $e) {
            $this->dispatch('delete_fail');
        }
    }

    public function render()
    {
        return view('livewire.commune.commune-table', [
            'communes' => Commune::where('district_id', $this->district->id)->get()
        ]);
    }
}
