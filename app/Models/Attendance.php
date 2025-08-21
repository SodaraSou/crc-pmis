<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'check_in_morning',
        'check_out_time_morning',
        'check_in_time_afternoon',
        'check_out_time_afternoon',
        'date',
        'session'
    ];
}
