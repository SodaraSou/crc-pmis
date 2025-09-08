<?php

namespace App\Livewire\Committee;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Committee;
use Livewire\WithPagination;

class CommitteeTable extends Component
{
    use WithPagination;

    public $per_page = 25;

    #[On('confirmed_delete')]
    public function delete($committee_id)
    {
        try {
            $committee = Committee::find($committee_id);
            if ($committee) {
                $committee->delete();
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
        return view(
            'livewire.committee.committee-table',
            [
                'committees' => Committee::paginate($this->per_page)
            ]
        );
    }
}
