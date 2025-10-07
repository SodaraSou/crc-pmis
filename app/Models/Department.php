<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Department extends Model
{
    protected $fillable = [
        'en_name',
        'kh_name',
        'en_abbr',
        'kh_abbr',
        'department_order'
    ];

    public function current_employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'employee_position')
            ->withPivot([
                'id',
                'employee_level_id',
                'position_id',
                'start_date',
                'end_date',
            ])
            ->where('employees.active', true)
            ->where('employee_position.active', true)
            ->whereNull('employee_position.end_date');
    }
}
