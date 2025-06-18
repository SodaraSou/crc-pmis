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
        return view('district.district-edit', [
            "district" => $district
        ]);
    }
}
