<?php

namespace App\Livewire\Employee;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\EmployeePosition;
use App\Models\Group;
use App\Models\SubBranch;
use App\Models\UserLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeTable extends Component
{
    use withPagination;

    public $user = null;

    public $sub_branches = [];

    public $groups = [];

    #[Url(except: '')]
    public $search = "";

    // #[Url(except: '')]
    // public $employee_level_id = '';
    // public $filter_employee_level = null;

    #[Url(except: '')]
    public $branch_id = '';
    public $filter_branch = null;

    #[Url(except: '')]
    public $sub_branch_id = '';
    public $filter_sub_branch = null;

    #[Url(except: '')]
    public $group_id = '';
    public $filter_group = null;

    public $per_page = 25;

    public function mount()
    {
        $this->user = Auth::user();

        if ($this->branch_id) {
            $this->filter_branch = Branch::find($this->branch_id);
        }

        if ($this->sub_branch_id) {
            $this->filter_sub_branch = SubBranch::find($this->sub_branch_id);
        }

        if ($this->group_id) {
            $this->filter_group = Group::find($this->group_id);
        }
    }

    public function resetFilter(): void
    {
        $this->reset('search', 'branch_id', 'sub_branch_id', 'group_id');
        $this->per_page = 25;
        $this->filter_branch = null;
        $this->filter_sub_branch = null;
        $this->filter_group = null;
    }

    public function removeFilter($filter): void
    {
        if ($filter == 'branch') {
            $this->branch_id = '';
            $this->filter_branch = null;
        } elseif ($filter == 'sub_branch') {
            $this->sub_branch_id = '';
            $this->filter_sub_branch = null;
        } elseif ($filter == 'group') {
            $this->group_id = '';
            $this->filter_group = null;
        }
    }

    public function updatedBranchId()
    {
        $this->filter_branch = Branch::find($this->branch_id);
        $this->sub_branches = SubBranch::where('branch_id', $this->branch_id)->get();
    }

    public function updatedSubBranchId()
    {
        $this->filter_sub_branch = SubBranch::find($this->sub_branch_id);
        $this->groups = Group::where('sub_branch_id', $this->sub_branch_id)->get();
    }

    public function updatedGroupId()
    {
        $this->filter_group = Group::find($this->group_id);
    }

    #[On('confirmed_delete')]
    public function delete($employee_id)
    {
        try {
            $member = Employee::where('id', $employee_id)->first();

            $member->update([
                'active' => false,
                'updated_by' => $this->user->id
            ]);

            EmployeePosition::where('active', true)
                ->where('employee_id', $employee_id)
                ->update([
                    'active' => false,
                    'updated_by' => $this->user->id
                ]);

            $this->dispatch('delete_success');
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        $query = Employee::query();

        $query->where('active', true);

        if ($this->search) {
            $query->where('kh_name', 'like', '%' . $this->search . '%');
        }

        if ($this->branch_id) {
            $query->whereHas('employee_positions', function ($ep) {
                $ep->where('active', true)
                    ->where('branch_id', $this->branch_id);
            });
        }

        if ($this->sub_branch_id) {
            $query->whereHas('employee_positions', function ($ep) {
                $ep->where('active', true)
                    ->where('sub_branch_id', $this->sub_branch_id);
            });
        }

        if ($this->group_id) {
            $query->whereHas('employee_positions', function ($ep) {
                $ep->where('active', true)
                    ->where('group_id', $this->group_id);
            });
        }

        return view('livewire.employee.employee-table', [
            'employees' => $query->paginate($this->per_page),
            'employee_levels' => UserLevel::all(),
            'branches' => Branch::all(),
        ]);
    }
}
