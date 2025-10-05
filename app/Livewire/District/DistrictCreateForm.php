<?php

namespace App\Livewire\District;

use App\Models\Committee;
use App\Models\District;
use App\Models\Province;
use App\Models\SubBranch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class DistrictCreateForm extends Component
{
    use WithFileUploads;

    public $province;
    public $province_id;
    #[Validate('required', message: "សូមបញ្ចូលលេខកូដ")]
    public $code = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះស្រុក/ខណ្ឌខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះស្រុក/ខណ្ឌឡាតាំង")]
    public $en_name = "";
    #[Validate('nullable|image', message: 'សូមជ្រើសរូបភាពត្រឹមត្រូវ')]
    public $sub_branch_img;

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

                if ($this->sub_branch_img) {
                    $path = $this->sub_branch_img->store("sub_branch/img", 'public');
                    $sub_branch->update([
                        'sub_branch_img' => Storage::url($path)
                    ]);
                }

                Committee::create([
                    'kh_name' => 'គណៈកិត្តិយសអនុសាខា ស្រុក' . $this->kh_name,
                    'en_name' => $this->en_name,
                    'branch_id' => $this->province->branch->id,
                    'sub_branch_id' => $sub_branch->id,
                    'committee_type_id' => 1,
                    'committee_level_id' => 3,
                ]);

                Committee::create([
                    'kh_name' => 'គណៈកម្មាធិការអនុសាខា ស្រុក' . $this->kh_name,
                    'en_name' => $this->en_name,
                    'branch_id' => $this->province->branch->id,
                    'sub_branch_id' => $sub_branch->id,
                    'committee_type_id' => 2,
                    'committee_level_id' => 3,
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
        return view('livewire.district.district-create-form');
    }
}
