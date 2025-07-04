<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Office;
use Illuminate\View\View;

class OfficeController extends Controller
{
    public function create(Department $department): View
    {
        return view('office.office-create', [
            'department' => $department,
        ]);
    }

    public function edit(Office $office): View
    {
        return view('office.office-edit', [
            'office' => $office,
        ]);
    }
}
