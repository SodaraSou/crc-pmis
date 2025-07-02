<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Illuminate\View\View;
use Livewire\Component;

class EmployeePositionTable extends Component
{
    public Employee $employee;

    public function mount(Employee $employee): void
    {
        $this->employee = $employee;
    }

    public function render(): View
    {
        return view('livewire.employee.employee-position-table');
    }
}
