<?php

namespace App\Http\Controllers;

use App\Models\UserLevel;

class UserLevelController extends Controller
{
    public function index()
    {
        return view('user-level.user-level-index');
    }

    public function create()
    {
        return view('user-level.user-create');
    }

    public function edit(UserLevel $user_level)
    {
        return view('user-level.user-edit', [
            'user_level' => $user_level
        ]);
    }
}
