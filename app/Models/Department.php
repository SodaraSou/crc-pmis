<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Department extends Model
{
    protected $fillable = [
        'en_name',
        'kh_name',
        'en_abbr',
        'kh_abbr',
        'department_order'
    ];

    public function employees(): HasManyThrough
    {
        return $this->hasManyThrough(
            Employee::class,           // Final model
            EmployeePosition::class,   // Intermediate model
            'department_id',           // Foreign key on employee_positions table
            'id',                      // Foreign key on employees table
            'id',                      // Local key on departments table
            'employee_id'              // Local key on employee_positions table
        );
    }
}
