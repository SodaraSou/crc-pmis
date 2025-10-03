<?php

namespace App\Livewire\Forms;

use App\Models\Employee;
use App\Models\EmployeePosition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EmployeeForm extends Form
{
    public Employee $employee;

    public $is_edit = false;

    public $title = '';

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះ')]
    public $kh_name = '';

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះឡាតាំង')]
    public $en_name = '';

    // #[Validate('required', message: 'សូមជ្រើសរើសស្ថានភាពគ្រួសារ')]
    public $family_situation_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសភេទ')]
    public $gender_id = null;

    // #[Validate('required', message: 'សូមបញ្ចូលថ្ងៃខែឆ្នាំកំណើត')]
    public $dob = null;

    // #[Validate('required', message: 'សូមបញ្ចូលលេខអត្តសញ្ញាណប័ណ្ខ')]
    public $national_id = '';

    // #[Validate('required', message: 'សូមជ្រើសរើសស្ថានភាពបុគ្គលិក')]
    public $employee_status_id = null;

    // #[Validate('required', message: 'សូមបញ្ចូលលេខទូរស័ព្ទ')]
    public $phone_number = '';

    // #[Validate('required', message: 'សូមបញ្ចូលអុីម៉ែល')]
    public $email = '';

    // #[Validate('image', message: 'សូមបញ្ចូលជារូបថត')]
    public $profile_img;
    public $preview_profile_img;

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

    public $ad_street_number = null;

    public $ad_street_name = null;

    public $ad_house_number = null;

    public $employee_level_id = null;

    public $branch_id = null;

    public $sub_branch_id = null;

    public $group_id = null;

    public $department_id = null;

    public $office_id = null;

    public $position_id = null;

    public $opt_position_name = null;

    public $start_date = null;

    public $end_date = null;

    protected function rules(): array
    {
        if (!$this->is_edit) {
            return [
                'employee_level_id' => 'required',
                'branch_id' => $this->employee_level_id > 1 ? 'required' : 'nullable',
                'sub_branch_id' => $this->employee_level_id > 2 ? 'required' : 'nullable',
                'group_id' => $this->employee_level_id == 4 ? 'required' : 'nullable',
                'department_id' => 'required',
                'position_id' => 'required',
                'start_date' => 'required',
            ];
        }
        return [];
    }

    protected function messages(): array
    {
        return [
            'employee_level_id' => 'សូមជ្រើសរើសថ្នាក់',
            'branch_id.required' => 'សូមជ្រើសរើសសាខា',
            'sub_branch_id.required' => 'សូមជ្រើសរើសអនុសាខា',
            'group_id.required' => 'សូមជ្រើសរើសក្រុមអនុសាខា',
            'department_id.required' => 'សូមជ្រើសរើសនាយកដ្ឋាន',
            'position_id' => 'សូមជ្រើសរើសដំណែង',
            'start_date' => 'សូមជ្រើសរើសថ្ងៃចាប់ផ្តើម',
        ];
    }

    public function setForm(Employee $employee): void
    {
        $this->employee = $employee;
        $this->title = $employee->title;
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
    }

    public function store()
    {
        return DB::transaction(function () {
            $employee = Employee::create([
                'title' => $this->title,
                'kh_name' => $this->kh_name,
                'en_name' => $this->en_name,
                'family_situation_id' => $this->family_situation_id,
                'gender_id' => $this->gender_id,
                'dob' => $this->dob,
                'national_id' => $this->national_id,
                'employee_status_id' => $this->employee_status_id,
                'phone_number' => $this->phone_number,
                'email' => $this->email,
                'bp_province_id' => $this->bp_province_id,
                'bp_district_id' => $this->bp_district_id,
                'bp_commune_id' => $this->bp_commune_id,
                'bp_village_id' => $this->bp_village_id,
                'ad_province_id' => $this->ad_province_id,
                'ad_district_id' => $this->ad_district_id,
                'ad_commune_id' => $this->ad_commune_id,
                'ad_village_id' => $this->ad_village_id,
                'ad_street_name' => $this->ad_street_name,
                'ad_street_number' => $this->ad_street_number,
                'ad_house_number' => $this->ad_house_number,
                'created_by' => Auth::user()->id,
            ]);

            if ($this->preview_profile_img) {
                $path = $this->preview_profile_img->store("employee/img", 'public');
                $employee->update([
                    'profile_img' => Storage::url($path),
                ]);
            }

            EmployeePosition::create([
                'employee_id' => $employee->id,
                'employee_level_id' => $this->employee_level_id,
                'position_id' => $this->position_id,
                'department_id' => $this->department_id,
                'office_id' => $this->office_id,
                'branch_id' => $this->branch_id,
                'sub_branch_id' => $this->sub_branch_id,
                'group_id' => $this->group_id,
                'opt_position_name' => $this->opt_position_name,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'created_by' => Auth::user()->id,
            ]);

            return $employee;
        });
    }

    public function update()
    {
        // Handle profile image update
        if ($this->preview_profile_img) {
            // Delete old image if exists
            if ($this->profile_img) {
                $oldPath = str_replace('/storage/', '', $this->profile_img);
                Storage::disk('public')->delete($oldPath);
            }
            // Store new image
            $path = $this->preview_profile_img->store("employee/img", 'public');
            $this->profile_img = Storage::url($path);
        }

        $this->employee->update([
            'title' => $this->title,
            'kh_name' => $this->kh_name,
            'en_name' => $this->en_name,
            'family_situation_id' => $this->family_situation_id,
            'gender_id' => $this->gender_id,
            'dob' => $this->dob,
            'national_id' => $this->national_id,
            'employee_status_id' => $this->employee_status_id,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'profile_img' => $this->profile_img,
            'bp_province_id' => $this->bp_province_id,
            'bp_district_id' => $this->bp_district_id,
            'bp_commune_id' => $this->bp_commune_id,
            'bp_village_id' => $this->bp_village_id,
            'ad_province_id' => $this->ad_province_id,
            'ad_district_id' => $this->ad_district_id,
            'ad_commune_id' => $this->ad_commune_id,
            'ad_village_id' => $this->ad_village_id,
            'ad_street_name' => $this->ad_street_name,
            'ad_street_number' => $this->ad_street_number,
            'ad_house_number' => $this->ad_house_number,
            'updated_by' => Auth::user()->id,
        ]);

        return $this->employee->refresh();
    }
}
