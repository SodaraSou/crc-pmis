<?php

namespace App\Http\Controllers;

use App\Models\Committee;

class CommitteeController extends Controller
{
    public function index()
    {
        return view('committee.committee-index');
    }

    public function create()
    {
        return view('committee.committee-create');
    }

    public function edit(Committee $committee)
    {
        return view('committee.committee-edit', [
            'committee' => $committee
        ]);
    }
}
