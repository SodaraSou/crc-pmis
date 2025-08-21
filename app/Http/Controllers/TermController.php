<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Committee;

class TermController extends Controller
{
    public function index()
    {
        return view('term.term-index');
    }

    public function create(Committee $committee)
    {
        return view('term.term-create', [
            'committee' => $committee
        ]);
    }
}
