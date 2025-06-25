<?php

namespace App\Http\Controllers;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }

    public function create()
    {
        return view('employee.create');
    }

    public function edit()
    {
        return view('employee.edit');
    }

    public function show()
    {
        return view('employee.show');
    }

}
