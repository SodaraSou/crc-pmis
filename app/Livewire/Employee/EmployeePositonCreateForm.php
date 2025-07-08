<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\EmployeePosition;
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EmployeePositonCreateForm extends Component
{
    public Employee $employee;

    public $branch_id = null;

    public $sub_branch_id = null;

    public $group_id = null;

    public $department_id = null;

    public $office_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសដំណែង')]
    public $position_id = null;

    public $opt_position_name = null;

    #[Validate('required', message: 'សូមជ្រើសរើសថ្ងៃចាប់ផ្តើម')]
    public $start_date = null;

    public $end_date = null;

    public function mount(Employee $employee): void
    {
        $this->employee = $employee;
        $this->branch_id = $employee->branch_id;
        $this->sub_branch_id = $employee->sub_branch_id;
        $this->group_id = $employee->group_id;
        $this->department_id = $employee->department_id;
        $this->office_id = $employee->office_id;
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
                'end_date' => $this->end_date,
            ]);
            $position = EmployeePosition::where('employee_id', $this->employee->id)->where('position_id', $validated['position_id'])->get();
            $this->employee->update([
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
            'positions' => Position::all(),
        ]);
    }
}
