<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends Model
{
    protected $fillable = [
        'title',
        'kh_first_name',
        'kh_last_name',
        'en_name',
        'gender_id',
        'phone_number',
        'bp_province_id',
        'bp_district_id',
        'bp_commune_id',
        'bp_village_id',
        'ad_province_id',
        'ad_district_id',
        'ad_commune_id',
        'ad_village_id',
        'member_position_order',
        'active',
        'created_by',
        'updated_by',
    ];

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function bp_province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function bp_district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function bp_commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }

    public function bp_village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function ad_province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function ad_district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function ad_commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }

    public function ad_village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function committees(): BelongsToMany
    {
        return $this->belongsToMany(Committee::class)
            ->using(CommitteeMember::class)
            ->withPivot(
                'branch_term_id',
                'sub_branch_term_id',
                'committee_position_id',
                'gov_position'
            );
    }

    public function committee_members(): HasMany
    {
        return $this->hasMany(CommitteeMember::class);
    }

    public function current_membership(): HasOne
    {
        return $this->hasOne(CommitteeMember::class)
            ->where('active', true)
            ->whereHas('branch_term', function ($bt) {
                $bt->where('branch_terms.active', true)
                    ->where('start_date', '<=', now()->toDateString())
                    ->latest('start_date');
            })
            ->orWhereHas('sub_branch_term', function ($sbt) {
                $sbt->where('sub_branch_terms.active', true)
                    ->where('start_date', '<=', now()->toDateString())
                    ->latest('start_date');
            });
    }
}
