<?php

namespace App\Livewire\Employee\Admin;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeePosition;
use App\Models\Group;
use App\Models\Office;
use App\Models\Position;
use App\Models\SubBranch;
use App\Models\UserLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EmployeePositionEditForm extends Component
{
    public Employee $employee;

    public EmployeePosition $employee_position;

    public $offices = [];

    public $sub_branches = [];

    public $groups = [];

    #[Validate('required', message: 'សូមជ្រើសរើសថ្នាក់')]
    public $employee_level_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសដំណែង')]
    public $position_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសនាយកដ្ឋាន')]
    public $department_id = null;

    public $office_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសសាខា')]
    public $branch_id = null;

    public $sub_branch_id = null;

    public $group_id = null;

    public $opt_position_name = null;

    #[Validate('required', message: 'សូមជ្រើសរើសថ្ងៃចាប់ផ្តើម')]
    public $start_date = null;

    public $end_date = null;

    public function mount(Employee $employee, EmployeePosition $employee_position): void
    {
        $this->employee = $employee;
        $this->employee_position = $employee_position;
        $this->employee_level_id = $employee_position->employee_level_id;
        $this->position_id = $employee_position->position_id;
        $this->department_id = $employee_position->department_id;
        $this->office_id = $employee_position->office_id;
        $this->branch_id = $employee_position->branch_id;
        $this->sub_branch_id = $employee_position->sub_branch_id;
        $this->opt_position_name = $employee_position->opt_position_name;
        $this->start_date = $employee_position->start_date;
        $this->end_date = $employee_position->end_date;
    }

    protected function rules(): array
    {
        return [
            'sub_branch_id' => $this->employee_level_id > 2 ? 'required' : 'nullable',
            'group_id' => $this->employee_level_id == 4 ? 'required' : 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'sub_branch_id.required' => 'សូមជ្រើសរើសអនុសាខា',
            'group_id.required' => 'សូមជ្រើសរើសក្រុមអនុសាខា',
        ];
    }

    public function updatedEmployeeLevelId(): void
    {
        if ($this->employee_level_id == 1) {
            $this->branch_id = 0;
        }
    }

    public function updatedBranchId(): void
    {
        $this->sub_branches = SubBranch::where('branch_id', $this->branch_id)->get();
    }

    public function updatedSubBranchId(): void
    {
        $this->groups = Group::where('sub_branch_id', $this->sub_branch_id)->get();
    }

    public function updatedDepartmentId(): void
    {
        $this->offices = Office::where('department_id', $this->department_id)->get();
    }

    public function updatedPositionId(): void
    {
        if ($this->position_id < 10) {
            $this->office_id = null;
        }
    }

    public function save()
    {
        $this->validate();
        try {
            $this->employee_position->update([
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
                'updated_by' => Auth::user()->id,
            ]);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'ដំណែងមន្ត្រីប្រតិបត្តិកែប្រែដោយជោគជ័យ!'
            ]);

            $encrypt_id = Crypt::encrypt($this->employee_position->employee_id);

            return redirect()->to("/employee/{$encrypt_id}");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.employee.admin.employee-position-edit-form', [
            'user_levels' => UserLevel::all(),
            'positions' => Position::all(),
            'departments' => Department::all(),
            'branches' => Branch::all(),
        ]);
    }
}
