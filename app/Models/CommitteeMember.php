<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteeMember extends Model
{
    protected $fillable = [
        'committee_member_id',
        'branch_term_id',
        'sub_branch_term_id',
        'committee_id',
        'committee_position_id',
        'gov_position',
    ];
}
