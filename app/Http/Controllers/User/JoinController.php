<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Join;
use App\Community;

class JoinController extends Controller
{
    //
    public function join(Join $join, Request $request) {
        $join = new Join;
        $join->community_id = $request->community_id;
        $join->user_id = Auth::user()->id;
        $join->save();

        return back();
    }
    public function leave(Join $join, Request $request) {
        $join = Join::where('community_id', $request->community_id)->where('user_id', Auth::id())->first();
        if($join) {
            $join->delete();
        }
        return back();
    }

    // public function join($communityId) {
    //     $user = Auth::user();
    //     // まだ参加していなければ参加
    //     if (!$user->is_join($communityId)) {
    //         $user->join()->attach($communityId);
    //     }
    //     return back();
    // }
    // public function leave($communityId) {
    //     $user = Auth::user();
    //     // すでに参加していれば退会
    //     if ($user->is_join($communityId)) {
    //         $user->join()->detach($communityId);
    //     }
    //     return back();
    // }
}
