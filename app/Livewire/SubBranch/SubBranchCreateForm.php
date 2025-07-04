<?php

namespace App\Livewire\SubBranch;

use App\Models\Branch;
use App\Models\District;
use App\Models\SubBranch;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SubBranchCreateForm extends Component
{
    public $branch;

    public $branch_id;

    #[Validate('required', message: 'សូមជ្រើសរើសស្រុក/ខណ្ឌ')]
    public $district_id = '';

    public function mount(Branch $branch)
    {
        $this->branch = $branch;
        $this->branch_id = $branch->id;
    }

    public function save()
    {
        $this->validate();
        try {
            $district = District::find($this->district_id);
            SubBranch::create([
                'en_name' => $district->en_name,
                'kh_name' => $district->kh_name,
                'branch_id' => $this->branch_id,
                'district_id' => $this->district_id,
            ]);

            return redirect()->to("/branch/{$this->branch_id}");
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.sub-branch.sub-branch-create-form', [
            'branches' => Branch::all(),
            'districts' => District::where('province_id', $this->branch->province->id)->get(),
        ]);
    }
}
