<?php

namespace App\Livewire\User;

use App\Models\Branch;
use App\Models\SubBranch;
use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserEditForm extends Component
{
    public $user;

    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះឡាតាំង")]
    public $name;
    #[Validate('required', message: "សូមបញ្ចូលអុីម៉ែល")]
    public $email;
    public $password;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខ្មែរ")]
    public $kh_name;
    #[Validate('required', message: "សូមបញ្ចូលលេខទូរស័ព្ទ")]
    public $phone_number;
    #[Validate('required', message: "សូមជ្រើសរើសលំដាប់អ្នកប្រើប្រាស់")]
    public $user_level_id;
    #[Validate('required', message: "សូមជ្រើសរើសតួនាទី")]
    public $selected_role;

    public $branch_id;
    public $sub_branches = [];
    public $sub_branch_id;

    protected function rules(): array
    {
        return [
            'branch_id' => $this->user_level_id == 2 || $this->user_level_id == 3 ? 'required' : 'nullable',
            'sub_branch_id' => $this->user_level_id == 3 ? 'required' : 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'branch_id.required' => 'សូមជ្រើសរើសសាខា',
            'sub_branch_id.required' => 'សូមជ្រើសរើសអនុសាខា',
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->kh_name = $user->kh_name;
        $this->phone_number = $user->phone_number;
        $this->user_level_id = $user->user_level_id;
        $this->selected_role = $user->roles->pluck('name')->first() ?? "";
        $this->branch_id = $user->branch_id;
        if ($user->branch_id) {
            $this->sub_branches = SubBranch::where('branch_id', $this->branch_id)->get();
        }
        $this->sub_branch_id = $user->sub_branch_id;
    }

    public function updatedBranchId()
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
                'kh_name' => $validated['kh_name'],
                'phone_number' => $validated['phone_number'],
                'user_level_id' => $validated['user_level_id'],
                'profile_img' => 'https://github.com/shadcn.png'
            ];
            if ($this->password) {
                $data['password'] = Hash::make($this->password);
            }
            if ($this->user_level_id == 2 || $this->user_level_id == 3) {
                $data['branch_id'] = $this->branch_id;
            }
            if ($this->user_level_id == 3) {
                $data['sub_branch_id'] = $this->sub_branch_id;
            }
            $this->user->update($data);
            $this->user->syncRoles($this->selected_role);
            return redirect()->to('/user');
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.user.user-edit-form', [
            'user_levels' => UserLevel::all(),
            'roles' => Role::all(),
            'branches' => Branch::all(),
        ]);
    }
}
