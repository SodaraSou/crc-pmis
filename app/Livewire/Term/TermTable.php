<?php

namespace App\Livewire\Term;

use Livewire\Component;
use App\Models\Committee;
use App\Models\Term;
use Livewire\Attributes\On;

class TermTable extends Component
{
    public $committee;

    public function mount(Committee $committee)
    {
        $this->committee = $committee;
    }

    #[On('confirmed_delete')]
    public function delete($term_id)
    {
        try {
            $term = Term::find($term_id);
            if ($term) {
                $term->delete();
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
        return view('livewire.term.term-table', [
            'terms' => Term::where('committee_id', $this->committee->id)->get()
        ]);
    }
}
