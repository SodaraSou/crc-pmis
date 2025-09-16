<?php

namespace App\Livewire\HonoraryCommittee;

use App\Models\CommitteeLevel;
use App\Models\Member;
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

    public $active_term = false;

    public $committee_level_id = null;

    public $per_page = 25;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        $today = now()->toDateString();

        $members = Member::where('active', true)
            ->whereHas('committees', function ($q) {
                $q->where('committee_type_id', 1);
            })
            ->paginate($this->per_page);

        return view('livewire.honorary-committee.honorary-committee-member-table', [
            'members' => $members,
            'committee_levels' => CommitteeLevel::all(),
        ]);
    }
}
