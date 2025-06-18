<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Province extends Model
{
    protected $fillable = [
        "id",
        "kh_name",
        "en_name",
    ];

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    public function branch(): HasOne
    {
        return $this->hasOne(Branch::class);
    }
}
