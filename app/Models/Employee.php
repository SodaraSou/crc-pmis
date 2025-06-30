<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
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
        'employee_level_id',
        'branch_id',
        'sub_branch_id',
        'department_id',
        'office_id',
    ];
}
