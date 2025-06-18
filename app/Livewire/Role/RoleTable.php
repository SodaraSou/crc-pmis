<?php

namespace App\Livewire\Role;

use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleTable extends Component
{
    use WithPagination;

    public $per_page = 10;
    #[Url()]
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    #[On('confirmed_delete')]
    public function delete($role_id)
    {
        try {
            $role = Role::find($role_id);
            if ($role) {
                $role->delete();
                $this->dispatch('delete_success');
            } else {
                $this->dispatch('delete_fail');
            }
        } catch (\Exception $e) {
            $this->dispatch('delete_fail');
        }
    }

    public function render()
    {
        $query = Role::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $roles = $query->paginate($this->per_page);

        return view('livewire.role.role-table', [
            'roles' => $roles
        ]);
    }
}
