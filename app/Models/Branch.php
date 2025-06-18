<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    protected $fillable = [
        "en_name",
        "kh_name",
        "province_id",
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function subBranchs(): HasMany
    {
        return $this->hasMany(SubBranch::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
