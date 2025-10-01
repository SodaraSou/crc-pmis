<?php

namespace App\Livewire\HonoraryCommittee\Admin;

use App\Livewire\Forms\MemberForm;
use App\Models\BranchTerm;
use App\Models\Committee;
use App\Models\CommitteeLevel;
use App\Models\CommitteePosition;
use App\Models\Commune;
use App\Models\District;
use App\Models\Gender;
use App\Models\Province;
use App\Models\SubBranchTerm;
use App\Models\Village;
use Livewire\Component;

class HonoraryCommitteeMemberCreateForm extends Component
{
    public MemberForm $form;

    public $committees = [];

    public $terms = [];

    public $bp_districts = [];

    public $bp_communes = [];

    public $bp_villages = [];

    public $ad_districts = [];

    public $ad_communes = [];

    public $ad_villages = [];

    public function updatedFormBpProvinceId(): void
    {
        $this->bp_districts = District::where('province_id', $this->form->bp_province_id)->get();
    }

    public function updatedFormBpDistrictId(): void
    {
        $this->bp_communes = Commune::where('district_id', $this->form->bp_district_id)->get();
    }

    public function updatedFormBpCommuneId(): void
    {
        $this->bp_villages = Village::where('commune_id', $this->form->bp_commune_id)->get();
    }

    public function updatedFormAdProvinceId(): void
    {
        $this->ad_districts = District::where('province_id', $this->form->ad_province_id)->get();
    }

    public function updatedFormAdDistrictId(): void
    {
        $this->ad_communes = Commune::where('district_id', $this->form->ad_district_id)->get();
    }

    public function updatedFormAdCommuneId(): void
    {
        $this->ad_villages = Village::where('commune_id', $this->form->ad_commune_id)->get();
    }

    public function updatedFormCommitteeLevelId(): void
    {
        $this->committees = Committee::where('active', true)
            ->where('committee_level_id', $this->form->committee_level_id)
            ->where('committee_type_id', 1)
            ->get();
    }

    public function updatedFormCommitteeId(): void
    {
        $committee = Committee::find($this->form->committee_id);
        if ($this->form->committee_level_id < 3) {
            $this->terms = BranchTerm::where('active', true)
                ->where('branch_id', $committee->branch->id)
                ->get();
        } else if ($this->form->committee_level_id == 3) {
            $this->terms = SubBranchTerm::where('active', true)
                ->where('sub_branch_id', $committee->sub_branch->id)
                ->get();
        }
    }

    public function save()
    {
        $this->validate();
        try {
            $this->form->store();

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'សមាជិកគណ:កិត្តិយសបានបង្កើតដោយជោគជ័យ!'
            ]);

            return redirect()->to('/honorary-committee/member');
        } catch (\Exception $e) {
            $this->dispatch('create_fail', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.honorary-committee.admin.honorary-committee-member-create-form', [
            'genders' => Gender::all(),
            'bp_provinces' => Province::all(),
            'ad_provinces' => Province::all(),
            'committee_levels' => CommitteeLevel::all(),
            'committee_positions' => CommitteePosition::all(),
        ]);
    }
}
