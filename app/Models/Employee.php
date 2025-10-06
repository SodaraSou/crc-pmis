<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    protected $fillable = [
        'title',
        'kh_name',
        'en_name',
        'family_situation_id',
        'gender_id',
        'dob',
        'national_id',
        'employee_status_id',
        'phone_number',
        'email',
        'profile_img',
        'bp_province_id',
        'bp_district_id',
        'bp_commune_id',
        'bp_village_id',
        'ad_province_id',
        'ad_district_id',
        'ad_commune_id',
        'ad_village_id',
        'ad_street_number',
        'ad_street_name',
        'ad_house_number',
        'employee_position_order',
        'active',
        'created_by',
        'updated_by'
    ];

    public function family_situation(): BelongsTo
    {
        return $this->belongsTo(FamilySituation::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function employee_status(): BelongsTo
    {
        return $this->belongsTo(EmployeeStatus::class);
    }

    public function employee_level(): BelongsTo
    {
        return $this->belongsTo(UserLevel::class);
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

    public function positions(): BelongsToMany
    {
        return $this->belongsToMany(Position::class)
            ->using(EmployeePosition::class)
            ->withPivot('id', 'department_id', 'office_id', 'branch_id', 'sub_branch_id', 'group_id', 'start_date', 'opt_position_name', 'end_date');
    }

    public function employee_positions(): HasMany
    {
        return $this->hasMany(EmployeePosition::class);
    }

    public function current_position(): HasOne
    {
        return $this->hasOne(EmployeePosition::class)
            ->where('active', true)
            ->where('start_date', '<=', now()->toDateString())
            ->whereNull('end_date')
            ->latest('start_date');
    }

    public function educations(): HasMany
    {
        return $this->hasMany(EmployeeEducation::class);
    }
}
