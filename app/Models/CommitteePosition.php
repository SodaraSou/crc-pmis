<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteePosition extends Model
{
    protected $fillable = [
        'kh_name',
        'en_name',
        'active'
    ];
}
