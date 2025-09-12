<?php

namespace App\Livewire\HonoraryCommittee;

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

    public $per_page = 25;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        $query = Member::where('active', true)
            ->whereHas('committees', function ($q) {
                $q->where('committee_type_id', 1);
            });

        if ($this->user->hasRole('Branch System Operator')) {
            $branch_id = $this->user->branch_id;
            $query->whereHas('committees', function ($q) use ($branch_id) {
                $q->where('branch_id', $branch_id);
            });
        }

        $members = $query->paginate($this->per_page);

        return view('livewire.honorary-committee.honorary-committee-member-table', [
            'members' => $members,
        ]);
    }
}
