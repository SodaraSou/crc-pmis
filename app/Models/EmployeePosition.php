<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeePosition extends Pivot
{
    protected $table = 'employee_position';

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);

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

    public function subbranch(): BelongsTo
    {
        return $this->belongsTo(SubBranch::class);

    }
}
