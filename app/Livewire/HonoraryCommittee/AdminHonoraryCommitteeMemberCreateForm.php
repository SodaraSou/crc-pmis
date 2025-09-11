<?php

namespace App\Livewire\HonoraryCommittee;

use App\Livewire\Forms\HonoraryCommitteeMemberForm;
use App\Models\Committee;
use App\Models\CommitteeLevel;
use App\Models\CommitteePosition;
use App\Models\Commune;
use App\Models\District;
use App\Models\Gender;
use App\Models\Province;
use App\Models\Village;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AdminHonoraryCommitteeMemberCreateForm extends Component
{
    public HonoraryCommitteeMemberForm $form;

    public $committee_level_id = null;

    public $committees = [];

    public $bp_districts = [];

    public $bp_communes = [];

    public $bp_villages = [];

    public $ad_districts = [];

    public $ad_communes = [];

    public $ad_villages = [];

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះ')]
    public $kh_name = '';

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះឡាតាំង')]
    public $en_name = '';

    #[Validate('required', message: 'សូមជ្រើសរើសភេទ')]
    public $gender_id = null;

    #[Validate('required', message: 'សូមបញ្ចូលលេខទូរស័ព្ទ')]
    public $phone_number = '';

    #[Validate('required', message: 'សូមជ្រើសរើសខេត្ត/រាជធានី')]
    public $bp_province_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសស្រុក/ខណ្ឌ')]
    public $bp_district_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសឃុំ/សង្កាត់')]
    public $bp_commune_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសភូមិ')]
    public $bp_village_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសខេត្ត/រាជធានី')]
    public $ad_province_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសស្រុក/ខណ្ឌ')]
    public $ad_district_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសឃុំ/សង្កាត់')]
    public $ad_commune_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសភូមិ')]
    public $ad_village_id = null;

    public function updatedBpProvinceId(): void
    {
        $this->bp_districts = District::where('province_id', $this->bp_province_id)->get();
    }

    public function updatedBpDistrictId(): void
    {
        $this->bp_communes = Commune::where('district_id', $this->bp_district_id)->get();
    }

    public function updatedBpCommuneId(): void
    {
        $this->bp_villages = Village::where('commune_id', $this->bp_commune_id)->get();
    }

    public function updatedAdProvinceId(): void
    {
        $this->ad_districts = District::where('province_id', $this->ad_province_id)->get();
    }

    public function updatedAdDistrictId(): void
    {
        $this->ad_communes = Commune::where('district_id', $this->ad_district_id)->get();
    }

    public function updatedAdCommuneId(): void
    {
        $this->ad_villages = Village::where('commune_id', $this->ad_commune_id)->get();
    }

    public function updatedCommitteeLevelId(): void
    {
        $this->committees = Committee::where('committee_level_id', $this->committee_level_id)
            ->where('committee_type_id', 1)
            ->get();
    }

    public function save()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.honorary-committee.admin-honorary-committee-member-create-form', [
            'genders' => Gender::all(),
            'bp_provinces' => Province::all(),
            'ad_provinces' => Province::all(),
            'committee_levels' => CommitteeLevel::all(),
            'committee_positions' => CommitteePosition::all(),
        ]);
    }
}
