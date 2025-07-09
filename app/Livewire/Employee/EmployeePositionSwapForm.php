<?php

namespace App\Livewire\Employee;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeePosition;
use App\Models\Group;
use App\Models\Office;
use App\Models\Position;
use App\Models\SubBranch;
use App\Models\UserLevel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EmployeePositionSwapForm extends Component
{
    public Employee $employee;

    #[Validate('required', message: 'សូមជ្រើសរើសថ្នាក់')]
    public $employee_level_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសសាខា')]
    public $branch_id = null;

    public $sub_branch_id = null;

    public $group_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសនាយកដ្ឋាន')]
    public $department_id = null;

    public $office_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសដំណែង')]
    public $position_id = null;

    public $opt_position_name = null;

    #[Validate('required', message: 'សូមជ្រើសរើសថ្ងៃចាប់ផ្តើម')]
    public $start_date = null;

    public $offices = [];

    public $sub_branches = [];

    public $groups = [];

    protected function rules(): array
    {
        return [
            'sub_branch_id' => $this->employee_level_id == 3 ? 'required' : 'nullable',
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

    public function mount(Employee $employee): void
    {
        $this->employee = $employee;
        $this->branch_id = $employee->branch_id;
        $this->sub_branch_id = $employee->sub_branch_id;
        $this->group_id = $employee->group_id;
        $this->department_id = $employee->department_id;
        $this->office_id = $employee->office_id;
        $this->employee_level_id = $employee->employee_level_id;
        $this->position_id = $employee->current_position->position_id;
        if ($this->employee->employee_level_id == 3) {
            $this->sub_branches = SubBranch::where('branch_id', $this->employee->branch_id)->get();
        }
        if ($this->employee->employee_level_id == 4) {
            $this->sub_branches = SubBranch::where('branch_id', $this->employee->branch_id)->get();
            $this->groups = Group::where('sub_branch_id', $this->employee->sub_branch_id)->get();
        }
        if ($this->employee->office_id) {
            $this->offices = Office::where('department_id', $this->employee->department_id)->get();
        }
    }

    public function updatedEmployeeLevelId(): void
    {
        if ($this->employee_level_id == 1) {
            $this->branch_id = 0;
            $this->sub_branch_id = null;
            $this->group_id = null;
        }
        if ($this->employee_level_id == 2) {
            $this->sub_branch_id = null;
        }
        if ($this->employee_level_id == 3) {
            $this->group_id = null;
            $this->sub_branches = SubBranch::where('branch_id', $this->branch_id)->get();
        }
        if ($this->employee_level_id == 4) {
            $this->groups = Group::where('sub_branch_id', $this->sub_branch_id)->get();
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

    public function save()
    {
        $validated = $this->validate();
        try {
            $encrypt_id = Crypt::encrypt($this->employee->id);
            $previous_positions = EmployeePosition::where('employee_id', $this->employee->id)
                ->whereNull('end_date')
                ->get();

            $new_start_date = Carbon::parse($validated['start_date']);

            foreach ($previous_positions as $prev) {
                $prev->end_date = $new_start_date->copy()->subDay()->format('Y-m-d');
                $prev->save();
            }

            EmployeePosition::create([
                'employee_id' => $this->employee->id,
                'branch_id' => $this->branch_id,
                'sub_branch_id' => $this->sub_branch_id,
                'group_id' => $this->group_id,
                'department_id' => $this->department_id,
                'office_id' => $this->office_id,
                'position_id' => $validated['position_id'],
                'opt_position_name' => $this->opt_position_name,
                'start_date' => $validated['start_date'],
            ]);
            $position = EmployeePosition::where('employee_id', $this->employee->id)->where('position_id', $validated['position_id'])->get();
            $this->employee->update([
                'branch_id' => $this->branch_id,
                'sub_branch_id' => $this->sub_branch_id,
                'group_id' => $this->group_id,
                'department_id' => $this->department_id,
                'office_id' => $this->office_id,
                'employee_level_id' => $this->employee_level_id,
                'current_position_id' => $position[0]->id,
            ]);

            return redirect()->to("/employee/{$encrypt_id}");
        } catch (\Exception $e) {
            $this->dispatch('swap_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.employee.employee-position-swap-form', [
            'user_levels' => UserLevel::all(),
            'departments' => Department::all(),
            'branches' => Branch::all(),
            'positions' => Position::all(),
        ]);
    }
}
