<?php

namespace App\Livewire\Employee;

use App\Livewire\Forms\EmployeeEducationForm;
use App\Models\DegreeType;
use App\Models\Employee;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;
use Livewire\Component;

class EmployeeEducationCreateForm extends Component
{
    public EmployeeEducationForm $form;

    public function mount(Employee $employee): void
    {
        $this->form->setEmployeeId($employee);
    }

    public function save()
    {
        $this->validate();
        try {
            $employee_education = $this->form->store();
            $encrypt_id = Crypt::encrypt($employee_education->employee_id);

            return redirect()->to("/employee/{$encrypt_id}");
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.employee.employee-education-create-form', [
            'degree_types' => DegreeType::all(),
        ]);
    }
}
