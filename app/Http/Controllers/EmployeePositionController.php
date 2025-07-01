<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeePositionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Employee $employee)
    {
        return view('employee.employee-position-create', [
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }
}
