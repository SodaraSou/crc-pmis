<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = [
        'en_name',
        'kh_name',
        'committee_id'
    ];

    public function committee()
    {
        return $this->belongsTo(Committee::class);
    }
}
