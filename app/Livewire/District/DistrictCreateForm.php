<?php

namespace App\Livewire\District;

use App\Models\Committee;
use App\Models\District;
use App\Models\Province;
use App\Models\SubBranch;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DistrictCreateForm extends Component
{
    public $province;
    public $province_id;
    #[Validate('required', message: "សូមបញ្ចូលលេខកូដ")]
    public $code = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះស្រុក/ខណ្ឌខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះស្រុក/ខណ្ឌឡាតាំង")]
    public $en_name = "";

    public function mount(Province $province)
    {
        $this->province = $province;
        $this->province_id = $province->id;
    }

    public function save()
    {
        $this->validate();
        try {
            DB::transaction(function () {
                $district = District::create([
                    'id' => $this->code,
                    'kh_name' => $this->kh_name,
                    'en_name' => $this->en_name,
                    'province_id' => $this->province_id
                ]);

                $sub_branch = SubBranch::create([
                    'id' => $this->code,
                    'kh_name' => $this->kh_name,
                    'en_name' => $this->en_name,
                    'branch_id' => $this->province->branch->id,
                    'district_id' => $district->id,
                ]);

                Committee::create([
                    'kh_name' => 'គណៈកិត្តិយសអនុសាខា ស្រុក' . $this->kh_name,
                    'en_name' => $this->en_name,
                    'sub_branch_id' => $sub_branch->id,
                    'committee_type_id' => 1,
                    'committee_level_id' => 2,
                ]);

                Committee::create([
                    'kh_name' => 'គណៈកម្មាធិការអនុសាខា ស្រុក' . $this->kh_name,
                    'en_name' => $this->en_name,
                    'sub_branch_id' => $sub_branch->id,
                    'committee_type_id' => 2,
                    'committee_level_id' => 2,
                ]);
            });

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'ស្រុក/ខណ្ឌបង្កើតដោយជោគជ័យ!'
            ]);

            return redirect()->to("/province/{$this->province_id}");
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.district.district-create-form', [
            'provinces' => Province::all()
        ]);
    }
}
