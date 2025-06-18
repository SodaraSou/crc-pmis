<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubBranch extends Model
{
    protected $fillable = [
        "en_name",
        "kh_name",
        "branch_id",
        "district_id",
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
