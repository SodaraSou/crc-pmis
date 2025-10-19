<?php

namespace App\Http\Controllers;

use App\Models\CommitteeMember;
use App\Models\Member;

class CommitteeController extends Controller
{
    public function indexMember()
    {
        return view('committee.committee-member-index');
    }

    public function createMember()
    {
        return view('committee.committee-member-create');
    }

    public function editMember(Member $member)
    {
        return view('committee.committee-member-edit', [
            'member' => $member
        ]);
    }

    public function addTerm(Member $member)
    {
        return view('committee.committee-member-term-add', [
            'member' => $member
        ]);
    }

    public function editTerm(CommitteeMember $committee_member)
    {
        return view('committee.committee-member-term-edit', [
            'committee_member' => $committee_member,
        ]);
    }

    public function showMember(Member $member)
    {
        $terms = $member->committee_members()->where('active', true)->get();

        return view('committee.committee-member-show', [
            'member' => $member,
            'terms' => $terms
        ]);
    }
}
