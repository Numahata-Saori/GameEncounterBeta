<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Console;
use App\Genre;
use App\Community;
use App\Join;

class CommunityController extends Controller
{
    //

    public function add() {
        return view('user.community.community');
    }

    // コンソールページを読み込む
    public function index() {
        // bladeファイルを読み込む
        $consoles = Console::all();
        return view('user.community.community', ['consoles' => $consoles]);
    }

    // ジャンルページページを読み込む
    public function communitygenre(Request $request) {
        $console = Console::find($request->console_id);
        $genres = Genre::all();
        // return view('user.community.community_genre', ['consoles' => $consoles, 'genres' => $genres]);
        return view('user.community.community_genre', compact('console', 'genres')) ;
    }

    // コミュニティ一覧ページを読み込む
    public function communitylist(Request $request) {
        $console = Console::find($request->console_id);
        $genre = Genre::find($request->genre_id);
        $communities = Community::where('console_id', $console->id)->where('genre_id', $genre->id)->get();
        // dd($console->id, $genre->id, $communities->toArray());
        // return view('user.community.community_genre', ['consoles' => $consoles, 'genres' => $genres]);
        return view('user.community.community_list', compact('console', 'genre', 'communities'));
    }

    // コミュニティ詳細ページを読み込む
    public function communitydetail(Request $request) {
        $console = Console::find($request->console_id);
        $genre = Genre::find($request->genre_id);
        $community = Community::find($request->community_id);

        $join = Join::where('community_id', $request->community_id)->where('user_id', Auth::id())->first();

        return view('user.community.community_detail', compact('console', 'genre', 'community'));
    }

    // public function joins() {
    //     $community = Auth::user()->joins()->orderBy('created_at', 'desc');
    //     $data = ['community' => $community,];
    //     return view('user.community.community_detail', $data);
    // }


}
