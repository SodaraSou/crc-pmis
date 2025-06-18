<?php

namespace App\Livewire\District;

use App\Models\District;
use App\Models\Province;
use Livewire\Attributes\On;
use Livewire\Component;

class DistrictTable extends Component
{
    public $province;

    public function mount(Province $province)
    {
        $this->province = $province;
    }

    #[On('confirmed_delete')]
    public function delete($district_id)
    {
        try {
            $district = District::find($district_id);
            if ($district) {
                $district->delete();
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
        return view('livewire.district.district-table', [
            'districts' => District::where('province_id', $this->province->id)->get()
        ]);
    }
}
