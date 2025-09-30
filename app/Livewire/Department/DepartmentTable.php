<?php

namespace App\Livewire\Department;

use App\Models\Department;
use Livewire\Attributes\On;
use Livewire\Component;

class DepartmentTable extends Component
{
    #[On('confirmed_delete')]
    public function delete($department_id)
    {
        try {
            $department = Department::find($department_id);
            if ($department) {
                $department->delete();
                $this->dispatch('delete_success');
            } else {
                $this->dispatch('delete_fail');
            }
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.department.department-table', [
            'departments' => Department::all()
        ]);
    }
}
