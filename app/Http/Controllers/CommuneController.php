<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\District;

class CommuneController extends Controller
{
    public function show(Commune $commune)
    {
        return view('commune.commune-show', [
            'commune' => $commune
        ]);
    }

    public function create(District $district)
    {
        return view('commune.commune-create', [
            'district' => $district
        ]);
    }

    public function edit(Commune $commune)
    {
        return view('commune.commune-edit', [
            'commune' => $commune
        ]);
    }
}
