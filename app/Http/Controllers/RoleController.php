<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view("role.role-index");
    }

    public function create()
    {
        return view("role.role-create");
    }

    public function edit(Role $role)
    {
        return view("role.role-edit", [
            "role" => $role
        ]);
    }
}
