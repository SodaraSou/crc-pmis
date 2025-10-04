<?php

namespace App\Http\Controllers;

use App\Models\Province;

class ProvinceController extends Controller
{
    public function index()
    {
        return view('province.province-index');
    }

    public function show(Province $province)
    {
        return view('province.province-show', [
            'province' => $province
        ]);
    }

    public function create()
    {
        return view('province.province-create');
    }

    public function edit(Province $province)
    {
        $province_id = $province->id;
        $branch = $province->branch;
        $honorary_committee = $branch->committees()->where('committee_type_id', 1)->first();
        $committee = $branch->committees()->where('committee_type_id', 2)->first();

        return view('province.province-edit', [
            'province_id' => $province_id,
            "province" => $province,
            'branch' => $branch,
            'honorary_committee' => $honorary_committee,
            'committee' => $committee,
        ]);
    }
}
