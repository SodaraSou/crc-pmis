<?php

namespace App\Http\Controllers;

use App\Models\Commune;

class CommuneController extends Controller
{
    public function show(Commune $commune)
    {
        return view('commune.commune-show', [
            'commune' => $commune
        ]);
    }
}
