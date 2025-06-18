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
        return view('province.province-edit', [
            "province" => $province
        ]);
    }
}
