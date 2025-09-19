<?php

namespace App\Livewire\Committee;

use App\Models\CommitteeMember;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CommitteeMemberDeleteButton extends Component
{
    public Member $member;
    public $user = null;

    public function mount(Member $member)
    {
        $this->member = $member;
        $this->user = Auth::user();
    }

    #[On('confirmed_delete')]
    public function delete($member_id)
    {
        try {
            $member = Member::where('id', $member_id)->first();

            $member->update([
                'active' => false,
                'updated_by' => $this->user->id
            ]);

            CommitteeMember::where('active', true)
                ->where('member_id', $member_id)
                ->update([
                    'active' => false,
                    'updated_by' => $this->user->id
                ]);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'សមាជិកគណ:កម្មាធិការបានលុបជោគជ័យ!'
            ]);

            return redirect()->to("/committee/member");
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.committee.committee-member-delete-button');
    }
}
