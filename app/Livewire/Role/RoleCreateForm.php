<?php

namespace App\Livewire\Role;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreateForm extends Component
{
    use WithPagination;

    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះតួនាទី")]
    public $name;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខ្មែរ")]
    public $kh_name;
    #[Validate('required', message: "សូមជ្រើសរើសមុខងារក្នុងប្រព័ន្ធយ៉ាងតិចមួយ")]
    public $selected_permissions = [];

    public function updatedSelectedPermissions()
    {
        $this->resetPage();
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $role = Role::create([
                'name' => $validated['name'],
                'kh_name' => $validated['kh_name']
            ]);
            $role->syncPermissions($validated['selected_permissions']);
            return redirect()->to('/role');
        } catch (\Exception $e) {
            $this->dispatch('create_fail');
        }
    }

    public function render()
    {
        return view('livewire.role.role-create-form', [
            'permissions' => Permission::get()
        ]);
    }
}
