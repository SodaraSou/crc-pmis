<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Group extends Model
{
    protected $fillable = [
        'en_name',
        'kh_name',
        'sub_branch_id',
        'commune_id',
    ];

    public function sub_branch(): BelongsTo
    {
        return $this->belongsTo(SubBranch::class);
    }

    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }
}
