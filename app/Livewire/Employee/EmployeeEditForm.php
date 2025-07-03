<?php

namespace App\Livewire\Employee;

use App\Livewire\Forms\EmployeeForm;
use App\Models\Branch;
use App\Models\Commune;
use App\Models\Department;
use App\Models\District;
use App\Models\Employee;
use App\Models\EmployeeStatus;
use App\Models\FamilySituation;
use App\Models\Gender;
use App\Models\Office;
use App\Models\Province;
use App\Models\SubBranch;
use App\Models\UserLevel;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;
use Livewire\Component;

class EmployeeEditForm extends Component
{
    public EmployeeForm $form;

    // Birth Place
    public $bp_districts = [];

    public $bp_communes = [];

    public $bp_villages = [];

    // Address
    public $ad_districts = [];

    public $ad_communes = [];

    public $ad_villages = [];

    public $sub_branches = [];

    public $offices = [];

    public function mount(Employee $employee): void
    {
        $this->form->setForm($employee);
        $this->bp_districts = District::where('province_id', $this->form->bp_province_id)->get();
        $this->bp_communes = Commune::where('district_id', $this->form->bp_district_id)->get();
        $this->bp_villages = Village::where('commune_id', $this->form->bp_commune_id)->get();
        $this->ad_districts = District::where('province_id', $this->form->ad_province_id)->get();
        $this->ad_communes = Commune::where('district_id', $this->form->ad_district_id)->get();
        $this->ad_villages = Village::where('commune_id', $this->form->ad_commune_id)->get();
        $this->sub_branches = SubBranch::where('branch_id', $this->form->branch_id)->get();
        $this->offices = Office::where('department_id', $this->form->department_id)->get();
        if (Auth::user()->user_level_id == 2 || Auth::user()->user_level_id == 3) {
            $this->sub_branches = SubBranch::where('branch_id', Auth::user()->branch_id)->get();
        }
    }

    public function updatedFormBpProvinceId(): void
    {
        $this->bp_districts = District::where('province_id', $this->form->bp_province_id)->get();
    }

    public function updatedFormBpDistrictId(): void
    {
        $this->bp_communes = Commune::where('district_id', $this->form->bp_district_id)->get();
    }

    public function updatedFormBpCommuneId(): void
    {
        $this->bp_villages = Village::where('commune_id', $this->form->bp_commune_id)->get();
    }

    public function updatedFormAdProvinceId(): void
    {
        $this->ad_districts = District::where('province_id', $this->form->ad_province_id)->get();
    }

    public function updatedFormAdDistrictId(): void
    {
        $this->ad_communes = Commune::where('district_id', $this->form->ad_district_id)->get();
    }

    public function updatedFormAdCommuneId(): void
    {
        $this->ad_villages = Village::where('commune_id', $this->form->ad_commune_id)->get();
    }

    public function updatedFormAdBranchId(): void
    {
        $this->sub_branches = SubBranch::where('branch_id', $this->form->branch_id)->get();
    }

    public function updatedFormDepartmentId(): void
    {
        $this->offices = Office::where('department_id', $this->form->department_id)->get();
    }

    public function save()
    {
        if ($this->form->sub_branch_id === '') {
            $this->form->sub_branch_id = null;
        }
        $this->validate();
        try {
            $old_department_id = $this->form->employee->department_id;
            $old_office_id = $this->form->employee->office_id;
            $old_branch_id = $this->form->employee->branch_id;
            $old_sub_branch_id = $this->form->employee->sub_branch_id;
            $employee = $this->form->update();
            $encrypt_id = Crypt::encrypt($employee->id);

            if ($old_department_id != $employee->department_id || $old_office_id != $employee->office_id || $old_branch_id != $employee->branch_id || $old_sub_branch_id != $employee->sub_branch_id) {
                return redirect()->to("/employee/{$encrypt_id}/position/create");
            }

            return redirect()->to("/employee/{$encrypt_id}");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.employee.employee-edit-form', [
            'family_situations' => FamilySituation::all(),
            'genders' => Gender::all(),
            'employee_statuses' => EmployeeStatus::all(),
            'user_levels' => UserLevel::all(),
            'branches' => Branch::all(),
            'departments' => Department::all(),
            'bp_provinces' => Province::all(),
            'ad_provinces' => Province::all(),
        ]);
    }
}
