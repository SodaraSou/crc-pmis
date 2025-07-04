<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\SubBranch;

class GroupController extends Controller
{
    public function create(SubBranch $sub_branch)
    {
        return view('group.group-create', [
            'sub_branch' => $sub_branch,
        ]);
    }

    public function edit(Group $group)
    {
        return view('group.group-edit', [
            'group' => $group,
        ]);
    }
}
