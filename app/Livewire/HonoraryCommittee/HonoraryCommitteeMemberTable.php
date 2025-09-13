<?php

namespace App\Livewire\HonoraryCommittee;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class HonoraryCommitteeMemberTable extends Component
{
    use WithPagination;

    public $user = null;

    #[Url()]
    public $search = "";

    public $per_page = 25;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        $current_date = Carbon::today()->toDateString();

        $query = Member::where('active', true)
            ->whereHas('committees', function ($committee_query) use ($current_date) {
                $committee_query->where('committee_type_id', 1)
                    ->whereHas('branch.terms', function ($term_query) use ($current_date) {
                        $term_query->where('start_date', '<=', $current_date)
                            ->where('end_date', '>=', $current_date);
                    });
            })
            ->with(['committees' => function ($committee_query) use ($current_date) {
                $committee_query->where('committee_type_id', 1)
                    ->whereHas('branch.terms', function ($term_query) use ($current_date) {
                        $term_query->where('start_date', '<=', $current_date)
                            ->where('end_date', '>=', $current_date);
                    });
            }]);

        $members = $query->paginate($this->per_page);

        return view('livewire.honorary-committee.honorary-committee-member-table', [
            'members' => $members,
        ]);
    }
}
