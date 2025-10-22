<?php

namespace App\Livewire\Committee\Admin;

use App\Models\Branch;
use App\Models\BranchTerm;
use App\Models\Committee;
use App\Models\CommitteeLevel;
use App\Models\CommitteeMember;
use App\Models\CommitteePosition;
use App\Models\SubBranchTerm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CommitteeMemberTermEditForm extends Component
{
    public $branch_id = '';
    public $branches = [];
    public $committee_levels = [];
    public $committee_positions = [];
    public $committees = [];
    public $terms = [];

    public CommitteeMember $committee_member;

    #[Validate('required', message: 'សូមជ្រើសរើសថ្នាក់គណ:កិត្តិយស')]
    public $committee_level_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសគណ:កិត្តិយស')]
    public $committee_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសអាណត្តិ')]
    public $term_id = null;

    #[Validate('required', message: 'សូមជ្រើសរើសតួនាទី')]
    public $committee_position_id = null;

    public $gov_position = null;

    public $member_position_order = 100;

    public function mount(CommitteeMember $committee_member)
    {
        $this->committee_levels = CommitteeLevel::all();
        $this->committee_positions = CommitteePosition::all();
        $this->committee_member = $committee_member;
        $this->committee_id = $committee_member->committee_id;
        $this->committee_level_id = $committee_member->committee->committee_level_id;
        $this->committees = Committee::where('committee_level_id', $this->committee_level_id)
            ->where('committee_type_id', 2)
            ->get();
        if ($this->committee_level_id < 3) {
            $this->terms = BranchTerm::where('active', true)
                ->where('branch_id', $committee_member->committee->branch->id)
                ->get();
            $this->term_id = $committee_member->branch_term_id;
        } else {
            $this->terms = SubBranchTerm::where('active', true)
                ->where('sub_branch_id', $committee_member->committee->branch->id)
                ->get();
            $this->term_id = $committee_member->sub_branch_term_id;
        }
        $this->committee_position_id = $committee_member->committee_position_id;
        $this->gov_position = $committee_member->gov_position;
        $this->member_position_order = $committee_member->member_position_order;
        if ($this->committee_level_id == 3) {
            $this->branches = Branch::all();
        }
    }

    public function updatedCommitteeLevelId(): void
    {
        $this->terms = [];
        $this->committees = Committee::where('committee_level_id', $this->committee_level_id)
            ->where('committee_type_id', 2)
            ->get();
        if ($this->committee_level_id == 3) {
            $this->branches = Branch::all();
        }
    }

    protected function rules(): array
    {
        return [
            'branch_id' => $this->committee_level_id == 3 ? 'required' : 'nullable'
        ];
    }

    protected function messages(): array
    {
        return [
            'branch_id.required' => 'សូមជ្រើសរើសសាខា'
        ];
    }

    public function updatedBranchId()
    {
        $this->committees = Committee::where('active', true)
            ->where('committee_level_id', $this->committee_level_id)
            ->where('committee_type_id', 1)
            ->where('branch_id', $this->branch_id)
            ->get();
    }

    public function updatedCommitteeId(): void
    {
        $committee = Committee::find($this->committee_id);
        if ($this->committee_level_id < 3) {
            $this->terms = BranchTerm::where('active', true)
                ->where('branch_id', $committee->branch->id)
                ->get();
        } else if ($this->committee_level_id == 3) {
            $this->terms = SubBranchTerm::where('active', true)
                ->where('sub_branch_id', $committee->sub_branch->id)
                ->get();
        }
    }

    public function save()
    {
        $this->validate();
        try {
            $user_id = Auth::user()->id;
            if ($this->committee_level_id < 3) {
                $this->committee_member->update([
                    'branch_term_id' => $this->term_id,
                    'committee_id' => $this->committee_id,
                    'committee_position_id' => $this->committee_position_id,
                    'gov_position' => $this->gov_position,
                    'member_position_order' => $this->member_position_order,
                    'updated_at' => $user_id
                ]);
            } else if ($this->committee_level_id == 3) {
                $this->committee_member->update([
                    'sub_branch_term_id' => $this->term_id,
                    'committee_id' => $this->committee_id,
                    'committee_position_id' => $this->committee_position_id,
                    'gov_position' => $this->gov_position,
                    'member_position_order' => $this->member_position_order,
                    'updated_at' => $user_id
                ]);
            }

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'កែប្រែអាណត្តិសមាជិកជោគជ័យ!'
            ]);

            return redirect()->to("/committee/member/{$this->committee_member->member_id}/edit");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.committee.admin.committee-member-term-edit-form');
    }
}
