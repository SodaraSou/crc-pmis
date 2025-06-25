<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['kh_name', 'en_name', 'department_id', 'office_id'];
}
