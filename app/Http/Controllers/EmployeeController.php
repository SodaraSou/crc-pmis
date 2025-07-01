<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Employee::class);

        return view('employee.employee-index');
    }

    public function create()
    {
        Gate::authorize('create', Employee::class);

        return view('employee.employee-create');
    }

    public function edit(Request $request)
    {
        $employee = Employee::find(Crypt::decrypt($request->employee_id));

        Gate::authorize('update', $employee);

        return view('employee.employee-edit', [
            'employee' => $employee,
        ]);
    }

    public function show(Request $request)
    {
        $employee = Employee::find(Crypt::decrypt($request->employee_id));

        Gate::authorize('view', $employee);

        return view('employee.employee-show', [
            'employee' => $employee->load(['positions.employees']),
        ]);
    }
}
