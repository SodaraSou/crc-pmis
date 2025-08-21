<?php

namespace App\Livewire\User;

use App\Models\Department;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    #[Url(except: 10)]
    public $per_page = 10;

    #[Url(except: '')]
    public $search = '';

    #[Url(except: '')]
    public $department_id = '';

    public function resetFilter(): void
    {
        $this->reset('search', 'department_id', 'per_page');
    }

    public function render(): View
    {
        $query = User::query();

        if ($this->search) {
            $query->where('name', 'like', '%'.$this->search.'%');
        }

        if ($this->department_id) {
            $query->where('department_id', $this->department_id);
        }

        return view('livewire.user.user-table', [
            'users' => $query->paginate($this->per_page),
            'departments' => Department::all(),
        ]);
    }
}
