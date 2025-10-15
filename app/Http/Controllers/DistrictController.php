<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;

class DistrictController extends Controller
{
    public function create(Province $province)
    {
        return view('district.district-create', [
            'province' => $province
        ]);
    }

    public function show(District $district)
    {
        return view('district.district-show', [
            'district' => $district
        ]);
    }

    public function edit(District $district)
    {
        $district_id = $district->id;
        $sub_branch = $district->subBranch;
        $honorary_committee = $sub_branch->committees()->where('committee_type_id', 1)->first();
        $committee = $sub_branch->committees()->where('committee_type_id', 2)->first();

        return view('district.district-edit', [
            'district_id' => $district_id,
            "district" => $district,
            'sub_branch' => $sub_branch,
            'honorary_committee' => $honorary_committee,
            'committee' => $committee
        ]);
    }
}
