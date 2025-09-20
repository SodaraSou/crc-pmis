<?php

namespace App\Livewire\Term\Admin;

use App\Models\Branch;
use App\Models\BranchTerm;
use App\Models\CommitteeLevel;
use App\Models\SubBranch;
use App\Models\SubBranchTerm;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TermCreateForm extends Component
{
    public $branch_id = null;
    public $sub_branch_id = null;
    public $level_id = null;
    public $sub_branches = [];
    public $is_create_from_show = false;

    public $en_name = null;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខ្មែរ")]

    public $kh_name = null;

    public $start_date = null;

    public $end_date = null;

    public function mount($branch_id, $sub_branch_id)
    {
        if ($branch_id) {
            $this->is_create_from_show = true;
            $this->level_id = 1;
            $this->branch_id = $branch_id;
        } else if ($sub_branch_id) {
            $this->is_create_from_show = true;
            $this->level_id = 2;
            $this->sub_branch_id = $sub_branch_id;
        }
    }

    protected function rules(): array
    {
        return [
            'level_id' => !$this->branch_id && !$this->sub_branch_id ? 'required' : 'nullable',
            'branch_id' => $this->level_id == 1 ? 'required' : 'nullable',
            'sub_branch_id' => $this->level_id == 2 ? 'required' : 'nullable'
        ];
    }

    protected function messages(): array
    {
        return [
            'level_id.required' => 'សូមជ្រើសរើសថ្នាក់',
            'branch_id.required' => 'សូមជ្រើសរើសសាខា',
            'sub_branch_id.required' => 'សូមជ្រើសរើសអនុសាខា',
        ];
    }

    public function updatedBranchId()
    {
        $this->sub_branches = SubBranch::where('branch_id', $this->branch_id)->get();
    }

    public function updatedLevelId()
    {
        if ($this->level_id == 2) {
            $this->sub_branches = SubBranch::where('branch_id', $this->branch_id)->get();
        }
    }

    public function save()
    {
        $this->validate();
        try {
            if ($this->level_id == 1) {
                BranchTerm::create([
                    'kh_name' => $this->kh_name,
                    'en_name' => $this->en_name,
                    'branch_id' => $this->branch_id,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                ]);
                session()->flash('toast', [
                    'type' => 'success',
                    'message' => 'អាណត្តិបានបង្កើតដោយជោគជ័យ!'
                ]);

                return redirect()->to("/branch/{$this->branch_id}");
            } else {
                SubBranchTerm::create([
                    'kh_name' => $this->kh_name,
                    'en_name' => $this->en_name,
                    'sub_branch_id' => $this->sub_branch_id,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                ]);
                session()->flash('toast', [
                    'type' => 'success',
                    'message' => 'អាណត្តិបានបង្កើតដោយជោគជ័យ!'
                ]);

                return redirect()->to("/sub-branch/{$this->sub_branch_id}");
            }
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.term.admin.term-create-form', [
            'committee_levels' => CommitteeLevel::all(),
            'branches' => Branch::all()
        ]);
    }
}
