<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;

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
}
