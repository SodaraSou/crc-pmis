<?php

namespace App\Livewire\Forms;

use App\Models\Employee;
use App\Models\EmployeeEducation;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EmployeeEducationForm extends Form
{
    public EmployeeEducation $employeeEducation;

    public $employee_id = null;

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះស្ថាប័នអប់រំ')]
    public $institution = null;

    #[Validate('required', message: 'សូមជ្រើសរើសប្រភេទសញ្ញាបត្រ')]
    public $degree_type_id = null;

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះជំនាញសិក្សា')]
    public $field_of_study = null;

    #[Validate('required', message: 'សូមបញ្ចូលឆ្នាំចាប់ផ្តើម')]
    public $start_year = null;

    #[Validate('required', message: 'សូមបញ្ចូលឆ្នាំបញ្ចប់')]
    public $end_year = null;

    public function setEmployeeId(Employee $employee): void
    {
        $this->employee_id = $employee->id;
    }

    public function setForm(EmployeeEducation $employeeEducation): void
    {
        $this->employeeEducation = $employeeEducation;
        $this->employee_id = $employeeEducation->employee_id;
        $this->institution = $employeeEducation->institution;
        $this->degree_type_id = $employeeEducation->degree_type_id;
        $this->field_of_study = $employeeEducation->field_of_study;
        $this->start_year = $employeeEducation->start_year;
        $this->end_year = $employeeEducation->end_year;
    }

    public function store()
    {
        return EmployeeEducation::create($this->all());
    }
}
