<?php

namespace App\Livewire\Committee\Admin;

use App\Models\BranchTerm;
use App\Models\Committee;
use App\Models\CommitteeLevel;
use App\Models\CommitteeMember;
use App\Models\CommitteePosition;
use App\Models\Member;
use App\Models\SubBranchTerm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CommitteeMemberTermForm extends Component
{
    public Member $member;

    public $committees = [];

    public $terms = [];

    #[Validate('required', message: 'សូមជ្រើសរើសថ្នាក់គណ:កម្មាធិការ')]
    public $committee_level_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសគណ:កម្មាធិការ')]
    public $committee_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសអាណត្តិ')]
    public $term_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសតួនាទី')]
    public $committee_position_id = null;

    #[Validate('required', message: 'សូមបញ្ចូលតួនាទីក្នុងរដ្ឋាភិបាល')]
    public $gov_position = null;

    public function mount(Member $member)
    {
        $this->member = $member;
    }

    public function updatedCommitteeLevelId(): void
    {
        $this->committees = Committee::where('committee_level_id', $this->committee_level_id)
            ->where('committee_type_id', 2)
            ->get();
    }

    public function updatedCommitteeId(): void
    {
        $committee = Committee::find($this->committee_id);
        if ($this->committee_level_id == 1) {
            $this->terms = BranchTerm::where('branch_id', $committee->branch->id)->get();
        } else if ($this->committee_level_id == 2) {
            $this->terms = SubBranchTerm::where('sub_branch_id', $committee->sub_branch->id)->get();
        }
    }

    public function save()
    {
        $this->validate();
        try {
            $exists = $this->member->committee_members()
                ->where('committee_id', $this->committee_id)
                ->where('active', true)
                ->when($this->committee_level_id == 1, function ($q) {
                    $q->where('active', true)
                        ->where('branch_term_id', $this->term_id);
                })
                ->when($this->committee_level_id == 2, function ($q) {
                    $q->where('active', true)
                        ->where('sub_branch_term_id', $this->term_id);
                })
                ->exists();

            if ($exists) {
                $this->dispatch('create_fail', message: 'អាណត្តិនេះមានរួចហើយ។');
                return;
            }

            if ($this->committee_level_id == 1) {
                CommitteeMember::create([
                    'member_id' => $this->member->id,
                    'branch_term_id' => $this->term_id,
                    'committee_id' => $this->committee_id,
                    'committee_position_id' => $this->committee_position_id,
                    'gov_position' => $this->gov_position,
                    'created_by' => Auth::user()->id,
                ]);
            } else if ($this->committee_level_id == 2) {
                CommitteeMember::create([
                    'member_id' => $this->member->id,
                    'sub_branch_term_id' => $this->term_id,
                    'committee_id' => $this->committee_id,
                    'committee_position_id' => $this->committee_position_id,
                    'gov_position' => $this->gov_position,
                    'created_by' => Auth::user()->id,
                ]);
            }

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'បន្ថែមអាណត្តិជោគជ័យ!'
            ]);

            return redirect()->to("/committee/member/{$this->member->id}/edit");
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.committee.admin.committee-member-term-form', [
            'committee_levels' => CommitteeLevel::all(),
            'committee_positions' => CommitteePosition::all(),
        ]);
    }
}
