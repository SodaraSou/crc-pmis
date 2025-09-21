<?php

namespace App\Http\Controllers;

use App\Models\BranchTerm;
use App\Models\SubBranchTerm;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index()
    {
        return view('term.term-index');
    }

    public function create(Request $request)
    {
        $branch_id = $request->query('branch_id');
        $sub_branch_id = $request->query('sub_branch_id');

        return view('term.term-create', [
            'branch_id' => $branch_id,
            'sub_branch_id' => $sub_branch_id
        ]);
    }

    public function editBranchTerm(BranchTerm $branch_term)
    {
        return view('term.term-branch-edit', [
            'branch_term' => $branch_term
        ]);
    }

    public function editSubBranchTerm(SubBranchTerm $sub_branch_term)
    {
        return view('term.term-branch-edit');
    }
}
