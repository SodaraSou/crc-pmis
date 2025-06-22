<?php

namespace App\Livewire\Permission;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionCreateForm extends Component
{
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះមុខងារប្រព័ន្ធ")]
    public $name;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខ្មែរ")]
    public $kh_name;

    public function save()
    {
        $validated = $this->validate();
        try {
            Permission::create($validated);
            return redirect()->to('/permission');
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.permission.permission-create-form');
    }
}
