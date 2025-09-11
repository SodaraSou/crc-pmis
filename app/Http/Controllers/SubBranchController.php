<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\SubBranch;

class SubBranchController extends Controller
{
    public function index()
    {
        return view('sub-branch.sub-branch-index');
    }

    public function create(Branch $branch)
    {
        return view('sub-branch.sub-branch-create', [
            'branch' => $branch
        ]);
    }

    public function show(SubBranch $sub_branch)
    {
        return view('sub-branch.sub-branch-show', [
            'sub_branch' => $sub_branch
        ]);
    }

    public function edit(SubBranch $sub_branch)
    {
        return view('sub-branch.sub-branch-edit', [
            'sub_branch' => $sub_branch
        ]);
    }
}
