<?php

namespace App\Livewire\Office;

use App\Models\Department;
use App\Models\Office;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class OfficeTable extends Component
{
    public Department $department;

    public function mount(Department $department): void
    {
        $this->department = $department;
    }

    #[On('confirmed_delete')]
    public function delete($office_id): void
    {
        try {
            $office = Office::find($office_id);
            if ($office) {
                $office->delete();
                $this->dispatch('delete_success');
            } else {
                $this->dispatch('delete_fail');
            }
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.office.office-table', [
            'offices' => Office::where('department_id', $this->department->id)->get(),
        ]);
    }
}
