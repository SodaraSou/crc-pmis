<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeePosition extends Pivot
{
    protected $table = 'employee_position';

    protected $fillable = [
        'employee_id',
        'employee_level_id',
        'position_id',
        'department_id',
        'branch_id',
        'sub_branch_id',
        'group_id',
        'office_id',
        'opt_position_name',
        'start_date',
        'end_date',
        'employee_position_order',
        'active',
        'created_by',
        'updated_by'
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function employee_level(): BelongsTo
    {
        return $this->belongsTo(UserLevel::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function sub_branch(): BelongsTo
    {
        return $this->belongsTo(SubBranch::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
