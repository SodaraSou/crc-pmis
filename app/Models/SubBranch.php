<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubBranch extends Model
{
    protected $fillable = [
        "id",
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

    public function committees(): HasMany
    {
        return $this->hasMany(Committee::class);
    }

    public function terms(): HasMany
    {
        return $this->hasMany(SubBranchTerm::class);
    }

    public function current_term(): HasOne
    {
        return $this->hasOne(SubBranchTerm::class)
            ->where('active', true)
            ->where('start_date', '<=', now()->toDateString())
            ->latest('start_date');
    }
}
