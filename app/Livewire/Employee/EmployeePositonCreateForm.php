<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EmployeePositonCreateForm extends Component
{
    public Employee $employee;

    #[Validate('required', message: 'សូមជ្រើសរើសដំណែង')]
    public $position_id = null;

    public $opt_position_name = null;

    #[Validate('required', message: 'សូមជ្រើសរើសថ្ងៃចាប់ផ្តើម')]
    public $start_date = null;

    public $end_date = null;

    public function mount(Employee $employee): void
    {
        $this->employee = $employee;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->employee->positions()->attach($validated['position_id'], [
                'opt_position_name' => $this->opt_position_name,
                'start_date' => $validated['start_date'],
                'end_date' => $this->end_date,
            ]);

            return redirect()->to('/employee');
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
