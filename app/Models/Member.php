<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'kh_name',
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
    ];
}
