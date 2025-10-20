<?php

namespace App\Http\Controllers;

use App\Models\CommitteeMember;
use App\Models\Member;

class HonoraryCommitteeController extends Controller
{
    public function indexMember()
    {
        return view('honorary-committee.honorary-committee-member-index');
    }

    public function createMember()
    {
        return view('honorary-committee.honorary-committee-member-create');
    }

    public function showMember(Member $member)
    {
        $terms = $member->committee_members()->where('active', true)->get();

        return view('honorary-committee.honorary-committee-member-show', [
            'member' => $member,
            'terms' => $terms
        ]);
    }

    public function editMember(Member $member)
    {
        return view('honorary-committee.honorary-committee-member-edit', [
            'member' => $member
        ]);
    }

    public function addTerm(Member $member)
    {
        return view('honorary-committee.honorary-committee-member-term-add', [
            'member' => $member
        ]);
    }

    public function editTerm(CommitteeMember $committee_member)
    {
        return view('honorary-committee.honorary-committee-member-term-edit', [
            'committee_member' => $committee_member
        ]);
    }
}
