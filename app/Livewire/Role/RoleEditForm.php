<?php

namespace App\Livewire\Role;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleEditForm extends Component
{
    use WithPagination;

    public $role;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះតួនាទី")]
    public $name;
    #[Validate('required', message: "សូមជ្រើសរើសមុខងារក្នុងប្រព័ន្ធយ៉ាងតិចមួយ")]
    public $selected_permissions = [];

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->selected_permissions = $role->permissions->pluck('name')->toArray();
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->role->update([
                'name' => $validated['name'],
            ]);
            $this->role->syncPermissions($validated['selected_permissions']);

            return redirect()->to('/role');
        } catch (\Exception $th) {
            $this->dispatch('update_fail');
        }
    }

    public function render()
    {
        return view('livewire.role.role-edit-form', [
            'permissions' => Permission::get()
        ]);
    }
}
