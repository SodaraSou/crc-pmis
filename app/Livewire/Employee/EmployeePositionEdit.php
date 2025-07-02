<?php

namespace App\Livewire\Employee;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeePosition;
use App\Models\Office;
use App\Models\Position;
use App\Models\SubBranch;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EmployeePositionEdit extends Component
{
    public Employee $employee;

    public EmployeePosition $employee_position;

    public $offices = [];

    public $sub_branches = [];

    #[Validate('required', message: 'សូមជ្រើសរើសដំណែង')]
    public $position_id = null;

    public $opt_position_name = null;

    #[Validate('required', message: 'សូមជ្រើសរើសនាយកដ្ឋាន')]
    public $department_id = null;

    public $office_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសសាខា')]
    public $branch_id = null;

    public $sub_branch_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសថ្ងៃចាប់ផ្តើម')]
    public $start_date = null;

    public $end_date = null;

    protected function rules(): array
    {
        return [
            'sub_branch_id' => $this->branch_id > 0 ? 'required' : 'nullable',
            'office_id' => $this->department_id == 1 ? 'nullable' : 'required',
        ];
    }

    protected function messages(): array
    {
        return [
            'sub_branch_id.required' => 'សូមជ្រើសរើសអនុសាខា',
            'office_id.required' => 'សូមជ្រើសរើសការិយាល័យ',
        ];
    }

    public function mount(Employee $employee, EmployeePosition $employee_position): void
    {
        $this->employee = $employee;
        $this->employee_position = $employee_position;
        $this->department_id = $employee_position->department_id;
        $this->offices = Office::where('department_id', $employee_position->department_id)->get();
        $this->office_id = $employee_position->office_id;
        $this->branch_id = $employee_position->branch_id;
        $this->sub_branches = SubBranch::where('branch_id', $employee_position->branch_id)->get();
        $this->sub_branch_id = $employee_position->sub_branch_id;
        $this->position_id = $employee_position->position_id;
        $this->start_date = $employee_position->start_date;
        $this->end_date = $employee_position->end_date;
        $this->opt_position_name = $employee_position->opt_position_name;
    }

    public function updatedDepartmentId(): void
    {
        $this->offices = Office::where('department_id', $this->department_id)->get();
    }

    public function updatedBranchId(): void
    {
        $this->sub_branches = SubBranch::where('branch_id', $this->branch_id)->get();
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $encrypt_id = Crypt::encrypt($this->employee_position->employee_id);
            $this->employee_position->update([
                'position_id' => $validated['position_id'],
                'department_id' => $validated['department_id'],
                'office_id' => $validated['office_id'],
                'branch_id' => $validated['branch_id'],
                'sub_branch_id' => $validated['sub_branch_id'],
                'opt_position_name' => $this->opt_position_name,
                'start_date' => $validated['start_date'],
                'end_date' => $this->end_date,
            ]);

            return redirect()->to("/employee/{$encrypt_id}");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.employee.employee-position-edit', [
            'positions' => Position::all(),
            'departments' => Department::all(),
            'branches' => Branch::all(),
        ]);
    }
}
