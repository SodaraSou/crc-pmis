<?php

namespace App\Http\Controllers;

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
        return view('honorary-committee.honorary-committee-member-show', [
            'member' => $member
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
}
