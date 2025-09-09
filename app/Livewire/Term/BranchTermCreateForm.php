<?php

namespace App\Livewire\Term;

use App\Models\BranchTerm;
use App\Models\CommitteeLevel;
use App\Models\SubBranch;
use App\Models\SubBranchTerm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BranchTermCreateForm extends Component
{
    public $user = null;
    public $is_create_from_show = false;

    public $en_name = null;
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខ្មែរ")]

    public $kh_name = null;

    public $level_id = 1;

    public $sub_branch_id = null;

    public $start_date = null;

    public $end_date = null;

    public function mount($sub_branch_id)
    {
        $this->user = Auth::user();

        if ($sub_branch_id) {
            $this->is_create_from_show = true;
            $this->level_id = 2;
            $this->sub_branch_id = $sub_branch_id;
        }
    }

    protected function rules(): array
    {
        return [
            'level_id' => !$this->sub_branch_id ? 'required' : 'nullable',
            'sub_branch_id' => $this->level_id == 2 ? 'required' : 'nullable'
        ];
    }

    protected function messages(): array
    {
        return [
            'level_id.required' => 'សូមជ្រើសរើសថ្នាក់',
            'sub_branch_id.required' => 'សូមជ្រើសរើសអនុសាខា',
        ];
    }

    public function save()
    {
        $this->validate();
        try {
            if ($this->level_id == 1) {
                BranchTerm::create([
                    'kh_name' => $this->kh_name,
                    'en_name' => $this->en_name,
                    'branch_id' => $this->user->branch_id,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                ]);
                session()->flash('toast', [
                    'type' => 'success',
                    'message' => 'អាណត្តិបានបង្កើតដោយជោគជ័យ!'
                ]);

                return redirect()->to("/term");
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
        return view('livewire.term.branch-term-create-form', [
            'committee_levels' => CommitteeLevel::all(),
            'sub_branches' => SubBranch::where('branch_id', $this->user->branch_id)->get(),
        ]);
    }
}
