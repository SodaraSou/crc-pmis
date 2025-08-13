<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function show(Request $request)
    {
        $user = $request->user()->load(['userLevel:id,kh_name', 'branch:id,kh_name', 'subBranch:id,kh_name', 'group:id,kh_name']);

        return $this->successResponse(new UserResource($user
        ), 'User retrieve successfully!');
    }
}
