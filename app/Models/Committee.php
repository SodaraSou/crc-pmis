<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Committee extends Model
{
    protected $fillable = [
        'kh_name',
        'en_name',
        'branch_id',
        'sub_branch_id',
        'committee_type_id',
        'committee_level_id'
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function sub_branch(): BelongsTo
    {
        return $this->belongsTo(SubBranch::class);
    }

    public function committee_type(): BelongsTo
    {
        return $this->belongsTo(CommitteeType::class);
    }

    public function committee_level(): BelongsTo
    {
        return $this->belongsTo(CommitteeLevel::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class)
            ->using(CommitteeMember::class)
            ->withPivot(
                'branch_term_id',
                'sub_branch_term_id',
                'committee_position_id',
                'gov_position'
            );
    }
}
