<?php

namespace App\Livewire\Permission;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionEditForm extends Component
{
    public $permission;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះឡាតាំង")]
    public $name;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខ្មែរ")]
    public $kh_name;

    public function mount(Permission $permission)
    {
        $this->permission = $permission;
        $this->name = $permission->name;
        $this->kh_name = $permission->kh_name;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->permission->update($validated);
            return redirect()->to('/permission');
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.permission.permission-edit-form');
    }
}
