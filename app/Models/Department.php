<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'en_name',
        'kh_name',
        'en_abbr',
        'kh_abbr',
        'department_order'
    ];
}
