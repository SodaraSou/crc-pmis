<?php

namespace App\Livewire\User;

use App\Models\Branch;
use App\Models\Department;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    #[Url(except: 25)]
    public $per_page = 25;

    #[Url(except: '')]
    public $search = '';

    #[Url(except: '')]
    public $department_id = '';

    public $filter_department = null;

    #[Url(except: '')]
    public $branch_id = '';

    public $filter_branch = null;

    public function resetFilter(): void
    {
        $this->reset('search', 'department_id', 'branch_id');
        $this->per_page = 25;
        $this->filter_department = null;
        $this->filter_branch = null;
    }

    public function removeFilter($filter): void
    {
        if ($filter == 'department') {
            $this->department_id = '';
            $this->filter_department = null;
        } elseif ($filter == 'branch') {
            $this->branch_id = '';
            $this->filter_branch = null;
        }
    }

    public function render(): View
    {
        $query = User::query();

        if ($this->search) {
            $query->where('name', 'like', '%'.$this->search.'%');
        }

        if ($this->department_id) {
            $query->where('department_id', $this->department_id);
            $this->filter_department = Department::find($this->department_id);
        }

        if ($this->branch_id) {
            $query->where('branch_id', $this->branch_id);
            $this->filter_branch = Branch::find($this->branch_id);
        }

        return view('livewire.user.user-table', [
            'departments' => Department::all(),
            'branches' => Branch::all(),
            'users' => $query
                ->orderBy('department_id', 'asc')
                ->orderBy('department_position_order', 'asc')
                ->paginate($this->per_page),
        ]);
    }
}
