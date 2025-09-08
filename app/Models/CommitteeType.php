<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteeType extends Model
{
    protected $fillable = [
        'kh_name',
        'en_name',
        'active'
    ];
}
