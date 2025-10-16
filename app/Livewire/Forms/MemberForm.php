<?php

namespace App\Livewire\Forms;

use App\Models\CommitteeMember;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MemberForm extends Form
{
    public Member $member;

    public $is_edit = false;

    public $title = '';

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះ')]
    public $kh_name = '';

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះឡាតាំង')]
    public $en_name = '';

    #[Validate('required', message: 'សូមជ្រើសរើសភេទ')]
    public $gender_id = null;

    // #[Validate('required', message: 'សូមបញ្ចូលលេខទូរស័ព្ទ')]
    public $phone_number = '';

    // #[Validate('required', message: 'សូមជ្រើសរើសខេត្ត/រាជធានី')]
    public $bp_province_id = null;

    // #[Validate('required', message: 'សូមជ្រើសរើសស្រុក/ខណ្ឌ')]
    public $bp_district_id = null;

    // #[Validate('required', message: 'សូមជ្រើសរើសឃុំ/សង្កាត់')]
    public $bp_commune_id = null;

    // #[Validate('required', message: 'សូមជ្រើសរើសភូមិ')]
    public $bp_village_id = null;

    // #[Validate('required', message: 'សូមជ្រើសរើសខេត្ត/រាជធានី')]
    public $ad_province_id = null;

    // #[Validate('required', message: 'សូមជ្រើសរើសស្រុក/ខណ្ឌ')]
    public $ad_district_id = null;

    // #[Validate('required', message: 'សូមជ្រើសរើសឃុំ/សង្កាត់')]
    public $ad_commune_id = null;

    // #[Validate('required', message: 'សូមជ្រើសរើសភូមិ')]
    public $ad_village_id = null;

    public $member_position_order = 100;

    public $committee_level_id = null;

    public $committee_id = null;

    public $term_id = null;

    public $committee_position_id = null;

    public $gov_position = null;

    protected function rules(): array
    {
        return [
            'committee_level_id' => $this->is_edit ? 'nullable' : 'required',
            'committee_id' => $this->is_edit ? 'nullable' : 'required',
            'term_id' => $this->is_edit ? 'nullable' : 'required',
            'committee_position_id' => $this->is_edit ? 'nullable' : 'required',
            'gov_position' => $this->is_edit ? 'nullable' : 'required',
        ];
    }

    protected function messages(): array
    {
        return [
            'committee_level_id.required' => 'សូមជ្រើសរើសថ្នាក់',
            'committee_id.required' => 'សូមជ្រើសរើស',
            'term_id.required' => 'សូមជ្រើសរើសអាណត្តិ',
            'committee_position_id.required' => 'សូមជ្រើសរើសតួនាទី',
            'gov_position.required' => 'សូមបញ្ចូលតួនាទីក្នុងរដ្ឋាភិបាល',
        ];
    }

    public function setForm(Member $member)
    {
        $this->member = $member;
        $this->title = $member->title;
        $this->kh_name = $member->kh_name;
        $this->en_name = $member->en_name;
        $this->gender_id = $member->gender_id;
        $this->phone_number = $member->phone_number;
        $this->bp_province_id = $member->bp_province_id;
        $this->bp_district_id = $member->bp_district_id;
        $this->bp_commune_id  = $member->bp_commune_id;
        $this->bp_village_id  = $member->bp_village_id;
        $this->ad_province_id = $member->ad_province_id;
        $this->ad_district_id = $member->ad_district_id;
        $this->ad_commune_id  = $member->ad_commune_id;
        $this->ad_village_id  = $member->ad_village_id;
        $this->member_position_order = $member->member_position_order;
    }

    public function store()
    {
        DB::transaction(function () {
            $user = Auth::user();

            $member = Member::create([
                'title' => $this->title,
                'kh_name' => $this->kh_name,
                'en_name' => $this->en_name,
                'gender_id' => $this->gender_id,
                'phone_number' => $this->phone_number,
                'bp_province_id' => $this->bp_province_id,
                'bp_district_id' => $this->bp_district_id,
                'bp_commune_id'  => $this->bp_commune_id,
                'bp_village_id'  => $this->bp_village_id,
                'ad_province_id' => $this->ad_province_id,
                'ad_district_id' => $this->ad_district_id,
                'ad_commune_id'  => $this->ad_commune_id,
                'ad_village_id'  => $this->ad_village_id,
                'member_position_order' => $this->member_position_order,
                'created_by' => $user->id,
            ]);

            if ($this->committee_level_id < 3) {
                CommitteeMember::create([
                    'member_id' => $member->id,
                    'branch_term_id' => $this->term_id,
                    'committee_id' => $this->committee_id,
                    'committee_position_id' => $this->committee_position_id,
                    'gov_position' => $this->gov_position,
                    'created_by' => $user->id,
                ]);
            } else if ($this->committee_level_id == 3) {
                CommitteeMember::create([
                    'member_id' => $member->id,
                    'sub_branch_term_id' => $this->term_id,
                    'committee_id' => $this->committee_id,
                    'committee_position_id' => $this->committee_position_id,
                    'gov_position' => $this->gov_position,
                    'created_by' => $user->id,
                ]);
            }
        });
    }

    public function update()
    {
        DB::transaction(function () {
            $this->member->update([
                'title' => $this->title,
                'kh_name' => $this->kh_name,
                'en_name' => $this->en_name,
                'gender_id' => $this->gender_id,
                'phone_number' => $this->phone_number,
                'bp_province_id' => $this->bp_province_id,
                'bp_district_id' => $this->bp_district_id,
                'bp_commune_id'  => $this->bp_commune_id,
                'bp_village_id'  => $this->bp_village_id,
                'ad_province_id' => $this->ad_province_id,
                'ad_district_id' => $this->ad_district_id,
                'ad_commune_id'  => $this->ad_commune_id,
                'ad_village_id'  => $this->ad_village_id,
                'member_position_order' => $this->member_position_order,
                'updated_by' => Auth::user()->id,
            ]);
        });
    }
}
