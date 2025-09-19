<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\Member;

class CommitteeController extends Controller
{
    public function index()
    {
        return view('committee.committee-index');
    }

    public function create()
    {
        return view('committee.committee-create');
    }

    public function show(Committee $committee)
    {
        return view('committee.committee-show', [
            'committee' => $committee
        ]);
    }

    public function edit(Committee $committee)
    {
        return view('committee.committee-edit', [
            'committee' => $committee
        ]);
    }

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

    public function showMember(Member $member)
    {
        $today = now()->toDateString();
        $current_committee = CommitteeMember::where('active', true)
            ->where('member_id', $member->id)
            ->where(function ($q) use ($today) {
                $q->whereHas('branch_term', function ($bt) use ($today) {
                    $bt->where('active', true)
                        ->where('start_date', '<=', $today)
                        ->where('end_date', '>=', $today);
                })
                    ->orWhereHas('sub_branch_term', function ($sbt) use ($today) {
                        $sbt->where('active', true)
                            ->where('start_date', '<=', $today)
                            ->where('end_date', '>=', $today);
                    });
            })
            ->first();
        $terms = $member->committee_members()->where('active', true)->get();

        return view('committee.committee-member-show', [
            'member' => $member,
            'current_committee' => $current_committee,
            'terms' => $terms
        ]);
    }
}
