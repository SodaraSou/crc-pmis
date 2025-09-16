<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CommitteeMember extends Pivot
{
    protected $table = "committee_member";

    protected $fillable = [
        'member_id',
        'branch_term_id',
        'sub_branch_term_id',
        'committee_id',
        'committee_position_id',
        'gov_position',
        'active',
        'created_by',
        'updated_by',
    ];

    public function branch_term(): BelongsTo
    {
        return $this->belongsTo(BranchTerm::class);
    }

    public function sub_branch_term(): BelongsTo
    {
        return $this->belongsTo(SubBranchTerm::class);
    }

    public function committee(): BelongsTo
    {
        return $this->belongsTo(Committee::class);
    }

    public function committee_position(): BelongsTo
    {
        return $this->belongsTo(CommitteePosition::class);
    }
}
