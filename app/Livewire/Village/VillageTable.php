<?php

namespace App\Livewire\Village;

use App\Models\Commune;
use App\Models\Village;
use Livewire\Attributes\On;
use Livewire\Component;

class VillageTable extends Component
{
    public $commune;

    public function mount(Commune $commune)
    {
        $this->commune = $commune;
    }

    #[On('confirmed_delete')]
    public function delete($village_id)
    {
        try {
            $village = Village::find($village_id);
            if ($village) {
                $village->delete();
                $this->dispatch('delete_success');
            } else {
                $this->dispatch('delete_fail');
            }
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.village.village-table', [
            'villages' => Village::where('commune_id', $this->commune->id)->get()
        ]);
    }
}
