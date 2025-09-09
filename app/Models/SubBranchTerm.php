<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubBranchTerm extends Model
{
    protected $fillable = [
        'kh_name',
        'en_name',
        'sub_branch_id',
        'start_date',
        'end_date'
    ];

    public function subBranch(): BelongsTo
    {
        return $this->belongsTo(SubBranch::class);
    }
}
