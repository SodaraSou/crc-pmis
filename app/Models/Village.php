<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Village extends Model
{
    protected $fillable = [
        "en_name",
        "kh_name",
        "commune_id",
    ];

    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }
}
