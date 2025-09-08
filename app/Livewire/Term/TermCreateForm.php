<?php

namespace App\Livewire\Term;

use App\Models\Branch;
use App\Models\CommitteeLevel;
use App\Models\SubBranch;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TermCreateForm extends Component
{
    public $user;
    public $branch_id = null;
    public $sub_branch_id = null;
    public $branches = [];
    public $sub_branches = [];

    public $en_name = null;

    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះខ្មែរ")]
    public $kh_name = null;

    public $level_id = null;

    public $start_date = null;

    public $end_date = null;

    public function mount($branch_id, $sub_branch_id)
    {
        $this->user = Auth::user();
        $this->branches = Branch::all();

        if ($this->user->hasRole('System Manager')) {
            if ($branch_id) {
                $this->branch_id = $branch_id;
            } else if ($sub_branch_id) {
                $this->sub_branch_id = $sub_branch_id;
            }
        } else if ($this->user->hasRole('Branch System Operator')) {
            $this->branch_id = $this->user->branch->id;
        } else if ($this->user->hasRole('Sub-Branch System Operator')) {
            $this->sub_branch_id = $this->user->subBranch->id;
        }
    }

    protected function rules(): array
    {
        return [
            'branch_id' => $this->branch_id ? 'required' : 'nullable',
            'sub_branch_id' => $this->sub_branch_id ? 'required' : 'nullable',
            'level_id' => !$this->branch_id && !$this->sub_branch_id ? 'required' : 'nullable'
        ];
    }

    protected function messages(): array
    {
        return [
            'branch_id.required' => 'សូមជ្រើសរើសសាខា',
            'sub_branch_id.required' => 'សូមជ្រើសរើសអនុសាខា',
            'level_id.required' => 'សូមជ្រើសរើសថ្នាក់'
        ];
    }

    public function updatedBranchId()
    {
        $this->sub_branches = SubBranch::where('branch_id', $this->branch_id)->get();
    }

    public function save()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.term.term-create-form', [
            'committee_levels' => CommitteeLevel::all()
        ]);
    }
}
