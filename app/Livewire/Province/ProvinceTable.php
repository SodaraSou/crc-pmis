<?php

namespace App\Livewire\Province;

use App\Models\Province;
use Livewire\Attributes\On;
use Livewire\Component;

class ProvinceTable extends Component
{
    #[On('confirmed_delete')]
    public function delete($province_id)
    {
        try {
            $province = Province::find($province_id);
            if ($province) {
                $province->delete();
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
        return view('livewire.province.province-table', [
            'provinces' => Province::all()
        ]);
    }
}
