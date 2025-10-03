<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Branch extends Model
{
    protected $fillable = [
        'id',
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

    public function committees(): HasMany
    {
        return $this->hasMany(Committee::class);
    }

    public function terms(): HasMany
    {
        return $this->hasMany(BranchTerm::class);
    }

    public function current_term(): HasOne
    {
        return $this->hasOne(BranchTerm::class)
            ->where('active', true)
            ->where('start_date', '<=', now()->toDateString())
            ->latest('start_date');
    }
}
