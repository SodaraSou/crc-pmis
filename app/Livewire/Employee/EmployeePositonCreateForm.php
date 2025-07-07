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

class EmployeePositonCreateForm extends Component
{
    public Employee $employee;

    public $offices = [];

    public $sub_branches = [];

    public $groups = [];

    #[Validate('required', message: 'សូមជ្រើសរើសថ្នាក់បុគ្គលិក')]
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

    public $end_date = null;

    protected function rules(): array
    {
        return [
            'sub_branch_id' => $this->employee_level_id == 3 ? 'required' : 'nullable',
            'group_id' => $this->employee_level_id == 4 ? 'required' : 'nullable',
            'office_id' => $this->position_id > 9 ? 'required' : 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'sub_branch_id.required' => 'សូមជ្រើសរើសអនុសាខា',
            'group_id.required' => 'សូមជ្រើសរើសក្រុមអនុសាខា',
            'office_id.required' => 'សូមជ្រើសរើសការិយាល័យ',
        ];
    }

    public function mount(Employee $employee): void
    {
        $this->employee = $employee;
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
                'position_id' => $validated['position_id'],
                'branch_id' => $validated['branch_id'],
                'sub_branch_id' => $validated['sub_branch_id'],
                'group_id' => $validated['group_id'],
                'department_id' => $validated['department_id'],
                'office_id' => $validated['office_id'],
                'opt_position_name' => $this->opt_position_name,
                'start_date' => $validated['start_date'],
                'end_date' => $this->end_date,
            ]);
            $position = EmployeePosition::where('employee_id', $this->employee->id)->where('position_id', $validated['position_id'])->get();
            $this->employee->update([
                'employee_level_id' => $validated['employee_level_id'],
                'branch_id' => $validated['branch_id'],
                'sub_branch_id' => $validated['sub_branch_id'],
                'group_id' => $validated['group_id'],
                'department_id' => $validated['department_id'],
                'office_id' => $validated['office_id'],
                'current_position_id' => $position[0]->id,
            ]);

            return redirect()->to("/employee/{$encrypt_id}");
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.employee.employee-positon-create-form', [
            'user_levels' => UserLevel::all(),
            'positions' => Position::all(),
            'departments' => Department::all(),
            'branches' => Branch::all(),
        ]);
    }
}
