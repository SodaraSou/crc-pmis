<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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

    public function edit(Employee $employee)
    {
        return view('employee.employee-edit', [
            'employee' => $employee,
        ]);
    }

    public function show(Employee $employee)
    {
        Gate::authorize('view', $employee);

        return view('employee.employee-show', [
            'employee' => $employee,
        ]);
    }
}
