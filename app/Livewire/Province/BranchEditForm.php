<?php

namespace App\Livewire\Province;

use App\Models\Branch;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class BranchEditForm extends Component
{
    use WithFileUploads;

    public $branch;
    public $province_id;

    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះ")]
    public $kh_name = "";
    #[Validate('required', message: "សូមបញ្ចូលឈ្មោះឡាតាំង")]
    public $en_name = "";
    #[Validate('nullable|image', message: 'សូមជ្រើសរូបភាពត្រឹមត្រូវ')]
    public $preview_branch_img;
    public $branch_img;

    public function mount(Branch $branch, $province_id)
    {
        $this->branch = $branch;
        $this->province_id = $province_id;
        $this->kh_name = $branch->kh_name;
        $this->en_name = $branch->en_name;
        $this->branch_img = $branch->branch_img;
    }

    public function save()
    {
        $this->validate();
        try {
            // Handle profile image update
            if ($this->preview_branch_img) {
                // Delete old image if exists
                if ($this->branch_img) {
                    $oldPath = str_replace('/storage/', '', $this->branch_img);
                    Storage::disk('public')->delete($oldPath);
                }
                // Store new image
                $path = $this->preview_branch_img->store("branch/img", 'public');
                $this->branch_img = Storage::url($path);
            }

            $this->branch->update([
                'kh_name' => $this->kh_name,
                'en_name' => $this->en_name,
                'branch_img' => $this->branch_img
            ]);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'សាខាកែប្រែដោយជោគជ័យ!'
            ]);

            return redirect()->to("/province/$this->province_id");
        } catch (\Exception $e) {
            $this->dispatch('update_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.province.branch-edit-form');
    }
}
