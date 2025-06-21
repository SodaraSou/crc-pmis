<?php

namespace App\Livewire\UserLevel;

use App\Models\UserLevel;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserLevelCreateForm extends Component
{
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះលំដាប់អ្នកប្រើប្រាស់ខ្មែរ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះលំដាប់អ្នកប្រើប្រាស់ឡាតាំង")]
    public $en_name = "";

    public function save()
    {
        $validated = $this->validate();
        try {
            UserLevel::create($validated);
            return redirect()->to('/user-level');
        } catch (\Exception $ex) {
            $this->dispatch('create_fail');
        }
    }

    public function render()
    {
        return view('livewire.user-level.user-level-create-form');
    }
}
