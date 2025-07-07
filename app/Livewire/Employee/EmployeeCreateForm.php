<?php

namespace App\Livewire\Employee;

use App\Livewire\Forms\EmployeeForm;
use App\Models\Commune;
use App\Models\District;
use App\Models\EmployeeStatus;
use App\Models\FamilySituation;
use App\Models\Gender;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;
use Livewire\Component;

class EmployeeCreateForm extends Component
{
    public EmployeeForm $form;

    public $bp_districts = [];

    public $bp_communes = [];

    public $bp_villages = [];

    public $ad_districts = [];

    public $ad_communes = [];

    public $ad_villages = [];

    public function mount(): void
    {
        if (Auth::user()->user_level_id == 2) {
            $this->form->branch_id = Auth::user()->branch_id;
        }
        if (Auth::user()->user_level_id == 3) {
            $this->form->branch_id = Auth::user()->branch_id;
            $this->form->sub_branch_id = Auth::user()->sub_branch_id;
            $this->form->employee_level_id = Auth::user()->user_level_id;
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

    public function save()
    {
        $this->validate();
        try {
            $employee = $this->form->store();
            $encrypt_id = Crypt::encrypt($employee->id);

            return redirect()->to("/employee/{$encrypt_id}/position/create");
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.employee.employee-create-form', [
            'family_situations' => FamilySituation::all(),
            'genders' => Gender::all(),
            'employee_statuses' => EmployeeStatus::all(),
            'bp_provinces' => Province::all(),
            'ad_provinces' => Province::all(),
        ]);
    }
}
