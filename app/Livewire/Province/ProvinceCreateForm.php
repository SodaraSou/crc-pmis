<?php

namespace App\Livewire\Province;

use App\Models\Branch;
use App\Models\Committee;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProvinceCreateForm extends Component
{
    use WithFileUploads;

    #[Validate('required', message: "សូមបញ្ចូលលេខកូដ")]
    public $code = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខេត្តខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខេត្តឡាតាំង")]
    public $en_name = "";
    #[Validate('nullable|image', message: 'សូមជ្រើសរូបភាពត្រឹមត្រូវ')]
    public $branch_img;

    public function save()
    {
        $this->validate();
        try {
            DB::transaction(function () {
                $province = Province::create([
                    'id' => $this->code,
                    'kh_name' => $this->kh_name,
                    'en_name' => $this->en_name
                ]);

                $branch = Branch::create([
                    'id' => $this->code,
                    'en_name' => $this->en_name,
                    'kh_name' => $this->kh_name,
                    'province_id' => $province->id
                ]);

                if ($this->branch_img) {
                    $path = $this->branch_img->store("branch/img", 'public');
                    $branch->update([
                        'branch_img' => Storage::url($path)
                    ]);
                }

                Committee::create([
                    'kh_name' => 'គណៈកិត្តិយសសាខា ខេត្ត' . $this->kh_name,
                    'en_name' => $this->en_name,
                    'branch_id' => $branch->id,
                    'committee_type_id' => 1,
                    'committee_level_id' => 2,
                ]);

                Committee::create([
                    'kh_name' => 'គណៈកម្មាធិការសាខា ខេត្ត' . $this->kh_name,
                    'en_name' => $this->en_name,
                    'branch_id' => $branch->id,
                    'committee_type_id' => 2,
                    'committee_level_id' => 2,
                ]);
            });

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'ខេត្តបង្កើតដោយជោគជ័យ!'
            ]);

            return redirect()->to('/province');
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.province.province-create-form');
    }
}
