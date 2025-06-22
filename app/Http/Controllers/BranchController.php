<?php

namespace App\Http\Controllers;

use App\Models\Branch;

class BranchController extends Controller
{
    public function index()
    {
        return view('branch.branch-index');
    }

    public function show(Branch $branch)
    {
        return view('branch.branch-show', [
            'branch' => $branch
        ]);
    }

    public function create()
    {
        return view('branch.branch-create');
    }

    public function edit(Branch $branch)
    {
        return view('branch.branch-edit', [
            'branch' => $branch
        ]);
    }
}
