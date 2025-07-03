<?php

namespace App\Livewire\Forms;

use App\Models\Employee;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EmployeeForm extends Form
{
    public Employee $employee;

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះ')]
    public $kh_name = '';

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះឡាតាំង')]
    public $en_name = '';

    #[Validate('required', message: 'សូមជ្រើសរើសស្ថានភាពគ្រួសារ')]
    public $family_situation_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសភេទ')]
    public $gender_id = null;

    #[Validate('required', message: 'សូមបញ្ចូលថ្ងៃខែឆ្នាំកំណើត')]
    public $dob = '';

    #[Validate('required', message: 'សូមបញ្ចូលលេខអត្តសញ្ញាណប័ណ្ខ')]
    public $national_id = '';

    #[Validate('required', message: 'សូមជ្រើសរើសស្ថានភាពបុគ្គលិក')]
    public $employee_status_id = null;

    #[Validate('required', message: 'សូមបញ្ចូលលេខទូរស័ព្ទ')]
    public $phone_number = '';

    #[Validate('required', message: 'សូមបញ្ចូលអុីម៉ែល')]
    public $email = '';

    #[Validate('required', message: 'សូមបញ្ចូលរូបភាព')]
    public $profile_img = 'https://github.com/shadcn.png';

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

    public $ad_street_number = null;

    public $ad_street_name = null;

    public $ad_house_number = null;

    #[Validate('required', message: 'សូមជ្រើសរើសថ្នាក់')]
    public $employee_level_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសសាខា')]
    public $branch_id = null;

    public $sub_branch_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសនាយកដ្ឋាន')]
    public $department_id = null;

    public $office_id = null;

    protected function rules(): array
    {
        return [
            'sub_branch_id' => $this->employee_level_id == 3 ? 'required' : 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'sub_branch_id.required' => 'សូមជ្រើសរើសអនុសាខា',
        ];
    }

    public function setForm(Employee $employee): void
    {
        $this->employee = $employee;
        $this->kh_name = $employee->kh_name;
        $this->en_name = $employee->en_name;
        $this->family_situation_id = $employee->family_situation_id;
        $this->gender_id = $employee->gender_id;
        $this->dob = $employee->dob;
        $this->national_id = $employee->national_id;
        $this->employee_status_id = $employee->employee_status_id;
        $this->phone_number = $employee->phone_number;
        $this->email = $employee->email;
        $this->profile_img = $employee->profile_img;
        $this->bp_province_id = $employee->bp_province_id;
        $this->bp_district_id = $employee->bp_district_id;
        $this->bp_commune_id = $employee->bp_commune_id;
        $this->bp_village_id = $employee->bp_village_id;
        $this->ad_province_id = $employee->ad_province_id;
        $this->ad_district_id = $employee->ad_district_id;
        $this->ad_commune_id = $employee->ad_commune_id;
        $this->ad_village_id = $employee->ad_village_id;
        $this->ad_street_number = $employee->ad_street_number;
        $this->ad_street_name = $employee->ad_street_name;
        $this->ad_house_number = $employee->ad_house_number;
        $this->employee_level_id = $employee->employee_level_id;
        $this->branch_id = $employee->branch_id;
        $this->sub_branch_id = $employee->sub_branch_id;
        $this->department_id = $employee->department_id;
        $this->office_id = $employee->office_id;
    }

    public function store()
    {
        return Employee::create($this->all());
    }

    public function update()
    {
        $this->employee->update($this->all());

        return $this->employee->refresh();
    }
}
