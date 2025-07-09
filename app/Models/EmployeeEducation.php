<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeEducation extends Model
{
    protected $table = 'employee_educations';

    protected $fillable = [
        'employee_id',
        'institution',
        'degree_type_id',
        'field_of_study',
        'start_year',
        'end_year',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function degree_type(): BelongsTo
    {
        return $this->belongsTo(DegreeType::class);
    }
}
