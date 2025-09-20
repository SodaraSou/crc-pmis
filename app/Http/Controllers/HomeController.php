<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Committee;
use App\Models\Member;
use App\Models\SubBranch;

class HomeController extends Controller
{
    public function index()
    {
        $branch_count = Branch::where('active', true)
            ->where('id', '>', 0)
            ->count();

        $sub_branch_count = SubBranch::where('active', true)->count();
        $honorary_committee_count = Committee::where('active', true)
            ->where('committee_type_id', 1)
            ->count();

        $committee_count = Committee::where('active', true)
            ->where('committee_type_id', 2)
            ->count();

        $honorary_committee_member_count = Member::where('active', true)
            ->whereHas('committee_members', function ($cm) {
                $cm->where('committee_member.active', true)
                    ->whereHas('committee', function ($c) {
                        $c->where('committees.active', true)
                            ->where('committee_type_id', 1);
                    });
            })->count();

        $committee_member_count = Member::where('active', true)
            ->whereHas('committee_members', function ($cm) {
                $cm->where('committee_member.active', true)
                    ->whereHas('committee', function ($c) {
                        $c->where('committees.active', true)
                            ->where('committee_type_id', 2);
                    });
            })->count();

        return view('home', [
            'branch_count' => $branch_count,
            'sub_branch_count' => $sub_branch_count,
            'honorary_committee_count' => $honorary_committee_count,
            'committee_count' => $committee_count,
            'honorary_committee_member_count' => $honorary_committee_member_count,
            'committee_member_count' => $committee_member_count
        ]);
    }
}
