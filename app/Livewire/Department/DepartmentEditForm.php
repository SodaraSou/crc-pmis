<?php

namespace App\Livewire\Department;

use App\Models\Department;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DepartmentEditForm extends Component
{
    public $department;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះនាយកដ្ឋានខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះនាយកដ្ឋានឡាតាំង")]
    public $en_name = "";
    #[Validate('required', message: "សូមបញ្ចូលលំដាប់")]
    public $department_order = "";

    public function mount(Department $department)
    {
        $this->department = $department;
        $this->kh_name = $department->kh_name;
        $this->en_name = $department->en_name;
        $this->department_order = $department->department_order;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->department->update($validated);
            return redirect()->to('/department');
        } catch (\Exception $ex) {
            $this->dispatch('update_fail');
        }
    }

    public function render()
    {
        return view('livewire.department.department-edit-form');
    }
}
