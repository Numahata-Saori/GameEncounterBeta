@extends('layouts.app')

@section('content')

<div class="com-1">
  <div class="com-3 com-5">
    <h2 class="com-5">GAME TOP</h2>

    {{-- <input type="hidden" name="community_id" value="{{$community->id}}"> --}}

      {{-- カスタムボタンの追加 --}}
      {{-- <button class="btn" data-btn>Submit</button> --}}

    {{-- <div class="css-ejhh2v">
      <div class="header-content__VqHn1 flex-row">
        <div class="community-thumbnail__YkffV">
          <div class="css-bjn8wh">
            <div class="css-aq9xmq">Official</div>
            <div class="lazy-img-wrap__Rbmmg css-ti9tnv" style="width: 100%; height: 100%;">
              <span class="css-ti9tnv lazy-img-placeholder__UuJb5"></span>
              <img class="lazy-img__lbCiP css-ti9tnv lazy entered loaded" data-src="https://prod-jp-cdn.pairs.lv/community/8e8d7004253734c917b492a24f963f8bcc4c0953?height=172&amp;impolicy=pairs172x172&amp;imwidth=172&amp;v=1&amp;width=172" alt="" role="presentation" data-ll-status="loaded" src="https://prod-jp-cdn.pairs.lv/community/8e8d7004253734c917b492a24f963f8bcc4c0953?height=172&amp;impolicy=pairs172x172&amp;imwidth=172&amp;v=1&amp;width=172" style="width: 100%; height: 100%; display: block;">
            </div>
          </div>
        </div>
        <div class="information__nQsXd">
          <span class="category-name__lOxDe typography-caption">恋愛・結婚</span>
          <div class="community-name__SDnBy typography-h6">告白ってむずかしい</div>
          <div class="participants__rAJos typography-body2">11026人 (女性2084人)</div>
        </div>
      </div>
      <div class="header-button__PhWmS">
        <button class="button__E0II1 large__ewxrQ typography-body1 stretch__EJpOA css-1imkhuf">このコミュニティに参加する</button>
      </div>
    </div> --}}

    <h3 class="com-5">{{ $community->name }}</h3>

    @if (Auth::check())
    {{-- {{ count(Auth::user()->joins->where('id', $community->id)) }}<br> --}}
    {{-- Auth::user()->joins→このuserが参加しているcommunityの配列を取得
    その中にcommunityのid(Controllerから取得したcommunityのid)があれば参加してるので退会ボタンを表示、なければ参加ボタンを表示 --}}
      @if (count(Auth::user()->joins->where('id', $community->id)))
      {{-- @if (Auth::user()->is_join($community->id)) --}}
        <form action="{{action('User\JoinController@leave')}}" method="POST">
          <input type="hidden" name="community_id" value="{{ $community->id }}">
          @csrf
          @method('DELETE')
          <button type="submit">退会する</button>
        </form>
      @else
        <form action="{{action('User\JoinController@join')}}" method="POST">
          <input type="hidden" name="community_id" value="{{ $community->id }}">
          @csrf
          <button type="submit">参加する</button>
        </form>
      @endif
    @endif


    {{-- <a href="#" class=btn>参加する</a> --}}

  </div>
</div>

@endsection
