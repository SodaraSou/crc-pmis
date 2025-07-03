<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\Office;
use App\Models\Position;
use Illuminate\View\View;
use Livewire\Component;

class EmployeePositionSwapForm extends Component
{
    public Employee $employee;

    public $offices = [];

    public function mount(Employee $employee): void
    {
        $this->employee = $employee;
        $this->offices = Office::where('department_id', $employee->department_id)->get();
    }

    public function render(): View
    {
        return view('livewire.employee.employee-position-swap-form', [
            'offices' => $this->offices,
            'positions' => Position::all(),
        ]);
    }
}
