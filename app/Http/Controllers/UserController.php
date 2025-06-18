<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view("user.user-index");
    }

    public function create()
    {
        return view("user.user-create");
    }

    public function edit(User $user)
    {
        return view("user.user-edit", [
            "user" => $user
        ]);
    }

    public function show(User $user)
    {
        return view("user.user-show", [
            "user" => $user
        ]);
    }
}
