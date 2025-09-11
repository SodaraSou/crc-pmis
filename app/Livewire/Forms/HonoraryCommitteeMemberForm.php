<?php

namespace App\Livewire\Forms;

use App\Models\CommitteeMember;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

class HonoraryCommitteeMemberForm extends Form
{
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

    #[Validate('required', message: 'សូមជ្រើសរើសថ្នាក់គណ:កិត្តិយស')]
    public $committee_level_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសគណ:កិត្តិយស')]
    public $committee_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសអាណត្តិ')]
    public $term_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសតួនាទី')]
    public $committee_position_id = null;

    #[Validate('required', message: 'សូមបញ្ចូលតួនាទីក្នុងរដ្ឋាភិបាល')]
    public $gov_position = null;

    public function store()
    {
        DB::transaction(function () {
            $member = Member::create([
                'kh_name'        => $this->kh_name,
                'en_name'        => $this->en_name,
                'gender_id'      => $this->gender_id,
                'phone_number'   => $this->phone_number,
                'bp_province_id' => $this->bp_province_id,
                'bp_district_id' => $this->bp_district_id,
                'bp_commune_id'  => $this->bp_commune_id,
                'bp_village_id'  => $this->bp_village_id,
                'ad_province_id' => $this->ad_province_id,
                'ad_district_id' => $this->ad_district_id,
                'ad_commune_id'  => $this->ad_commune_id,
                'ad_village_id'  => $this->ad_village_id,
                'created_by' => Auth::user()->id,
            ]);

            if ($this->committee_level_id == 1) {
                CommitteeMember::create([
                    'member_id' => $member->id,
                    'branch_term_id' => $this->term_id,
                    'committee_id' => $this->committee_id,
                    'committee_position_id' => $this->committee_position_id,
                    'gov_position' => $this->gov_position,
                    'created_by' => Auth::user()->id,
                ]);
            } else if ($this->committee_level_id == 2) {
                CommitteeMember::create([
                    'member_id' => $member->id,
                    'sub_branch_term_id' => $this->term_id,
                    'committee_id' => $this->committee_id,
                    'committee_position_id' => $this->committee_position_id,
                    'gov_position' => $this->gov_position,
                    'created_by' => Auth::user()->id,
                ]);
            }
        });
    }
}
