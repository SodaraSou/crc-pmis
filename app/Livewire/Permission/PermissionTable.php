<?php

namespace App\Livewire\Permission;

use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionTable extends Component
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
    public function delete($permission_id)
    {
        try {
            $permission = Permission::find($permission_id);
            if ($permission) {
                $permission->delete();
                $this->dispatch('delete_success');
            } else {
                $this->dispatch('delete_fail');
            }
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        $query = Permission::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $permissions = $query->paginate($this->per_page);

        return view('livewire.permission.permission-table', [
            'permissions' => $permissions
        ]);
    }
}
