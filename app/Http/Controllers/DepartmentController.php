<?php

namespace App\Http\Controllers;

use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('department.department-index');
    }

    public function create()
    {
        return view('department.department-create');
    }

    public function edit(Department $department)
    {
        return view('department.department-edit', [
            'department' => $department
        ]);
    }
}
