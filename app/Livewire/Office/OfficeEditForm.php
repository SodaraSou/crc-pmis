<?php

namespace App\Livewire\Office;

use App\Models\Office;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class OfficeEditForm extends Component
{
    public Office $office;

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះខ្មែរ')]
    public $kh_name = null;

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះឡាតាំង')]
    public $en_name = null;

    public $department_id = null;

    public function mount(Office $office): void
    {
        $this->office = $office;
        $this->kh_name = $office->kh_name;
        $this->en_name = $office->en_name;
        $this->department_id = $office->department_id;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->office->update([
                'kh_name' => $validated['kh_name'],
                'en_name' => $validated['en_name'],
                'department_id' => $this->department_id,
            ]);

            return redirect()->to("/department/{$this->department_id}");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.office.office-edit-form');
    }
}
