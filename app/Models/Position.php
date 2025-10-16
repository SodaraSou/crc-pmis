<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Position extends Model
{
    protected $fillable = [
        'male_kh_name',
        'female_kh_name',
        'en_name',
    ];

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class)
            ->using(EmployeePosition::class)
            ->withPivot('id', 'department_id', 'office_id', 'branch_id', 'sub_branch_id', 'group_id', 'start_date', 'opt_position_name', 'end_date');
    }
}
