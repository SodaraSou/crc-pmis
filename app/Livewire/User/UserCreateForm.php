<?php

namespace App\Livewire\User;

use App\Models\Branch;
use App\Models\Department;
use App\Models\SubBranch;
use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserCreateForm extends Component
{
    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះឡាតាំង')]
    public $name = '';

    #[Validate('required', message: 'សូមបញ្ចូលអុីម៉ែល')]
    public $email = '';

    #[Validate('required', message: 'សូមបញ្ចូលលេខសម្ងាត់')]
    public $password = '';

    #[Validate('required', message: 'សូមបញ្ចូលឈ្មោះខ្មែរ')]
    public $kh_name = '';

    #[Validate('required', message: 'សូមបញ្ចូលលេខទូរស័ព្ទ')]
    public $phone_number = '';

    #[Validate('required', message: 'សូមជ្រើសរើសលំដាប់អ្នកប្រើប្រាស់')]
    public $user_level_id = '';

    #[Validate('required', message: 'សូមជ្រើសរើសតួនាទីក្នុងប្រព័ន្ធ')]
    public $selected_role = '';

    #[Validate('required', message: 'សូមជ្រើសរើសសាខា')]
    public $branch_id;

    public $sub_branches = [];

    public $branches = [];

    public $sub_branch_id;

    #[Validate('required', message: 'សូមជ្រើសរើសនាយកដ្ឋាន')]
    public $department_id;

    #[Validate('required', message: 'សូមបញ្ចូលតួនាទី')]
    public $position = '';

    public $department_position_order = 0;

    protected function rules(): array
    {
        return [
            'sub_branch_id' => $this->user_level_id == 3 ? 'required' : 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'sub_branch_id.required' => 'សូមជ្រើសរើសអនុសាខា',
        ];
    }

    public function mount(): void
    {
        $this->branches = Branch::all();
    }

    public function updatedUserLevelId(): void
    {
        if ($this->user_level_id > 1) {
            $this->branches = Branch::where('id', '!=', 0)->get();
        } else {
            $this->branches = Branch::where('id', 0)->get();
        }
    }

    public function updatedBranchId(): void
    {
        $this->sub_branches = SubBranch::where('branch_id', $this->branch_id)->get();
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $data = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'kh_name' => $validated['kh_name'],
                'phone_number' => $validated['phone_number'],
                'user_level_id' => $validated['user_level_id'],
                'profile_img' => 'https://github.com/shadcn.png',
                'department_id' => $validated['department_id'],
                'position' => $validated['position'],
                'department_position_id' => $this->department_position_order,
            ];
            if ($this->user_level_id == 2 || $this->user_level_id == 3) {
                $data['branch_id'] = $this->branch_id;
            }
            if ($this->user_level_id == 3) {
                $data['sub_branch_id'] = $this->sub_branch_id;
            }
            $user = User::create($data);
            $user->assignRole($this->selected_role);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'បានរក្សាទុកជោគជ័យ!',
            ]);

            return redirect()->to('/user');
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.user.user-create-form', [
            'user_levels' => UserLevel::all(),
            'roles' => Role::all(),
            'branches' => $this->branches,
            'departments' => Department::all(),
        ]);
    }
}
