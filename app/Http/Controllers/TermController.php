<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index()
    {
        return view('term.term-index');
    }

    public function create(Request $request)
    {
        $branch_id = $request->query('branch_id');
        $sub_branch_id = $request->query('sub_branch_id');

        return view('term.term-create', [
            'branch_id' => $branch_id,
            'sub_branch_id' => $sub_branch_id
        ]);
    }
}
