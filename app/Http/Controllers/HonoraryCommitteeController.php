<?php

namespace App\Http\Controllers;

class HonoraryCommitteeController extends Controller
{
    public function indexMember()
    {
        return view('honorary-committee.honorary-committee-member-index');
    }

    public function createMember()
    {
        return view('honorary-committee.honorary-committee-member-create');
    }
}
