<?php

namespace App\Livewire\Office;

use App\Models\Department;
use App\Models\Office;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class OfficeCreateForm extends Component
{
    public Department $department;

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះខ្មែរ')]
    public $kh_name = null;

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះឡាតាំង')]
    public $en_name = null;

    public $department_id = null;

    public function mount(Department $department): void
    {
        $this->department = $department;
        $this->department_id = $department->id;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            Office::create([
                'kh_name' => $validated['kh_name'],
                'en_name' => $validated['en_name'],
                'department_id' => $this->department_id,
            ]);

            return redirect()->to("/department/{$this->department_id}");
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.office.office-create-form');
    }
}
