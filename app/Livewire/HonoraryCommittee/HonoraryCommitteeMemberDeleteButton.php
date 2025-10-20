<?php

namespace App\Livewire\HonoraryCommittee;

use App\Models\CommitteeMember;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class HonoraryCommitteeMemberDeleteButton extends Component
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

            $member->delete();

            // $member->update([
            //     'active' => false,
            //     'updated_by' => $this->user->id
            // ]);

            // CommitteeMember::where('active', true)
            //     ->where('member_id', $member_id)
            //     ->update([
            //         'active' => false,
            //         'updated_by' => $this->user->id
            //     ]);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'សមាជិកគណ:កិត្តិយសបានលុបជោគជ័យ!'
            ]);

            return redirect()->to("/honorary-committee/member");
        } catch (\Exception $e) {
            $this->dispatch('delete_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.honorary-committee.honorary-committee-member-delete-button');
    }
}
