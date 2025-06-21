<?php

namespace App\Livewire\UserLevel;

use App\Models\UserLevel;
use Livewire\Attributes\On;
use Livewire\Component;

class UserLevelTable extends Component
{
    #[On('confirmed_delete')]
    public function delete($user_level_id)
    {
        try {
            $user_level = UserLevel::find($user_level_id);
            if ($user_level) {
                $user_level->delete();
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
        return view('livewire.user-level.user-level-table', [
            'user_levels' => UserLevel::all()
        ]);
    }
}
