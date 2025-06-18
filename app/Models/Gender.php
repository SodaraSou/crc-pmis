<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'en_name',
        'kh_name',
        'en_abbr',
        'kh_abbr'
    ];
}
