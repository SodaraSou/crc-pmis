<?php

namespace App\Livewire\UserLevel;

use App\Models\UserLevel;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserLevelEditForm extends Component
{
    public $user_level;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះលំដាប់អ្នកប្រើប្រាស់ខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះលំដាប់អ្នកប្រើប្រាស់ឡាតាំង")]
    public $en_name = "";

    public function mount(UserLevel $user_level)
    {
        $this->user_level = $user_level;
        $this->kh_name = $user_level->kh_name;
        $this->en_name = $user_level->en_name;
    }

    public function save()
    {
        $validated = $this->validate();
        try {
            $this->user_level->update($validated);
            return redirect()->to('/user-level');
        } catch (\Exception $ex) {
            $this->dispatch('update_fail');
        }
    }

    public function render()
    {
        return view('livewire.user-level.user-level-edit-form');
    }
}
