<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeePosition;
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
            'employee' => $employee,
            'positions' => $employee->positions,
        ]);
    }

    public function createPosition(Request $request)
    {
        $employee = Employee::find(Crypt::decrypt($request->employee_id));

        Gate::authorize('managePosition', $employee);

        return view('employee.employee-position-create', [
            'employee' => $employee,
        ]);
    }

    public function editPosition(Request $request)
    {
        $employee = Employee::find(Crypt::decrypt($request->employee_id));
        $employee_position = EmployeePosition::find(Crypt::decrypt($request->employee_position_id));

        Gate::authorize('managePosition', $employee);

        return view('employee.employee-position-edit', [
            'employee' => $employee,
            'employee_position' => $employee_position,
        ]);
    }

    public function swapPosition(Request $request)
    {
        $employee = Employee::find(Crypt::decrypt($request->employee_id));

        Gate::authorize('managePosition', $employee);

        return view('employee.employee-position-swap', [
            'employee' => $employee,
        ]);
    }
}
