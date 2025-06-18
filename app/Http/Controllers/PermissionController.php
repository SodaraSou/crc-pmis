<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view("permission.permission-index");
    }

    public function create()
    {
        return view("permission.permission-create");
    }

    public function edit(Permission $permission)
    {
        return view("permission.permission-edit", [
            "permission" => $permission
        ]);
    }
}
