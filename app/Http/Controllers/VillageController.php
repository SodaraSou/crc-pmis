<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Village;

class VillageController extends Controller
{
    public function create(Commune $commune)
    {
        return view('village.village-create', [
            'commune' => $commune
        ]);
    }
    
    public function edit(Village $village)
    {
        return view('village.village-edit', [
            'village' => $village
        ]);
    }
}
