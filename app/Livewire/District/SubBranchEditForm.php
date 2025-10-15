<?php

namespace App\Livewire\District;

use App\Models\SubBranch;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubBranchEditForm extends Component
{
    use WithFileUploads;

    public $sub_branch;
    public $district_id;

    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះឡាតាំង")]
    public $en_name = "";
    #[Validate('nullable|image', message: 'សូមជ្រើសរូបភាពត្រឹមត្រូវ')]
    public $preview_sub_branch_img;
    public $sub_branch_img;

    public function mount(SubBranch $sub_branch, $district_id)
    {
        $this->sub_branch = $sub_branch;
        $this->district_id = $district_id;
        $this->kh_name = $sub_branch->kh_name;
        $this->en_name = $sub_branch->en_name;
        $this->sub_branch_img = $sub_branch->sub_branch_img;
    }

    public function save()
    {
        $this->validate();
        try {
            // Handle profile image update
            if ($this->preview_sub_branch_img) {
                // Delete old image if exists
                if ($this->sub_branch_img) {
                    $oldPath = str_replace('/storage/', '', $this->sub_branch_img);
                    Storage::disk('public')->delete($oldPath);
                }
                // Store new image
                $path = $this->preview_sub_branch_img->store("sub_branch/img", 'public');
                $this->sub_branch_img = Storage::url($path);
            }

            $this->sub_branch->update([
                'kh_name' => $this->kh_name,
                'en_name' => $this->en_name,
                'sub_branch_img' => $this->sub_branch_img
            ]);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'អនុសាខាកែប្រែដោយជោគជ័យ!'
            ]);

            return redirect()->to("/district/$this->district_id");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.district.sub-branch-edit-form');
    }
}
