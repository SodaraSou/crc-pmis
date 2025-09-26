<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchTerm extends Model
{
    public $fillable = [
        'kh_name',
        'en_name',
        'branch_id',
        'start_date',
        'end_date',
        'active',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
