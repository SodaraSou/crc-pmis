<?php

namespace App\Livewire\Permission;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionEditForm extends Component
{
    public $permission;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះមុខងារប្រព័ន្ធ")]
    public $name;

    public function mount(Permission $permission)
    {
        $this->permission = $permission;
        $this->name = $permission->name;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->permission->update($validated);
            return redirect()->to('/permission');
        } catch (\Exception $e) {
            $this->dispatch('update_fail');
        }
    }

    public function render()
    {
        return view('livewire.permission.permission-edit-form');
    }
}
