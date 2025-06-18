<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserLevel extends Model
{
    protected $fillable = [
        'en_name',
        'kh_name',
    ];

    public function Users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
