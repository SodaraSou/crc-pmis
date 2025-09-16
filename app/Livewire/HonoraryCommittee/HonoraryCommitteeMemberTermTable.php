<?php

namespace App\Livewire\HonoraryCommittee;

use App\Models\CommitteeMember;
use App\Models\Member;
use Livewire\Attributes\On;
use Livewire\Component;

class HonoraryCommitteeMemberTermTable extends Component
{
    public Member $member;

    public $member_term_count = 0;

    public function mount(Member $member)
    {
        $this->member = $member;
        $this->member_term_count = $member->committee_members()
            ->where('active', true)
            ->count();
    }

    #[On('confirmed_delete')]
    public function delete($committee_member_id)
    {
        if ($this->member_term_count == 1) {
            $this->dispatch('delete_fail', message: 'មិនអាចលុបបាន');
            return;
        }
        try {
            $committee_member = CommitteeMember::find($committee_member_id);
            if ($committee_member) {
                $committee_member->update([
                    'active' => false,
                ]);
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
        return view('livewire.honorary-committee.honorary-committee-member-term-table', [
            'terms' => $this->member->committee_members()
                ->where('active', true)
                ->get(),
        ]);
    }
}
