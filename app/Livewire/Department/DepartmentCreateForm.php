<?php

namespace App\Livewire\Department;

use App\Models\Department;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DepartmentCreateForm extends Component
{
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះនាយកដ្ឋានខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះនាយកដ្ឋានឡាតាំង")]
    public $en_name = "";
    #[Validate('required', message: "សូមបញ្ចូលលំដាប់")]
    public $department_order = "";

    public function save()
    {
        $validated = $this->validate();
        try {
            Department::create($validated);
            return redirect()->to('/department');
        } catch (\Exception $ex) {
            $this->dispatch('create_fail');
        }
    }

    public function render()
    {
        return view('livewire.department.department-create-form');
    }
}
