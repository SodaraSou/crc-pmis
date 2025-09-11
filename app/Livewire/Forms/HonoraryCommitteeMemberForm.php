<?php

namespace App\Livewire\Forms;

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

    #[Validate('required', message: 'សូមជ្រើសរើសគណ:កិត្តិយស')]
    public $committee_id = null;

    public function store() {}
}
