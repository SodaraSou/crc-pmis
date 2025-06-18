<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;

class UserTable extends Component
{
    public $per_page = 10;
    #[Url()]
    public $search = '';

    public function render()
    {
        $query = User::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $user = $query->paginate($this->per_page);

        return view('livewire.user.user-table', [
            'users' => $user
        ]);
    }
}
