<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\EmployeePosition;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class EmployeePositionTable extends Component
{
    public Employee $employee;

    public $employee_position_count = 0;

    public function mount(Employee $employee): void
    {
        $this->employee = $employee;
        $this->employee_position_count = $employee->employee_positions()
            ->where('active', true)
            ->count();
    }

    #[On('confirmed_delete')]
    public function delete($employee_position_id)
    {
        if ($this->employee_position_count == 1) {
            $this->dispatch('delete_fail', message: 'មិនអាចលុបបាន');
            return;
        }
        try {
            $employee_position = EmployeePosition::find($employee_position_id);
            if ($employee_position) {
                $employee_position->delete();
                $this->dispatch('delete_success');
            } else {
                $this->dispatch('delete_fail');
            }
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.employee.employee-position-table', [
            'positions' => $this->employee->employee_positions()
                ->where('active', true)
                ->get(),
        ]);
    }
}
