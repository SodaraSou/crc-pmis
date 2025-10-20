<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\EmployeePosition;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class EmployeeDeleteButton extends Component
{
    public Employee $employee;
    public $user = null;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
        $this->user = Auth::user();
    }

    #[On('confirmed_delete')]
    public function delete($employee_id)
    {
        try {
            $employee = Employee::where('id', $employee_id)->first();

            $employee->delete();

            // $member->update([
            //     'active' => false,
            //     'updated_by' => $this->user->id
            // ]);

            // EmployeePosition::where('active', true)
            //     ->where('employee_id', $employee_id)
            //     ->update([
            //         'active' => false,
            //         'updated_by' => $this->user->id
            //     ]);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'មន្រ្តីប្រតិបត្តិបានលុបជោគជ័យ!'
            ]);

            return redirect()->to("/employee");
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.employee.employee-delete-button');
    }
}
