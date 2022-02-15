@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール</h2>

      <br>
      <div>
        <a class="btn btn-primary" href="{{ route('profile_create') }}" role="button">新規登録</a>
        <a class="btn btn-primary" href="{{ route('profile_edit') }}" role="button">編集</a>
        <a class="btn btn-primary" href="{{ action('User\ProfileController@edit') }}">編集</a>
      </div>
      <br>

      <form action="{{ action('User\ProfileController@index') }}" method="get">

        <div class="form-group row">
          <div class="mb-3">
            <div class="form-text text-info">
              @if (Auth::user()->profile->image_path)
                <img width="100px" src="{{ asset('storage/image/' . Auth::user()->profile->image_path) }}">
              @else
                <img width="100px" src="{{ asset('storage/image/noimage.png') }}">
              @endif
            </div>
          </div>
        </div>


        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">ニックネーム</label><br>
              {{-- <th>{{ Auth::user()->profile->name }}</th> --}}
              <th>{{ Auth::user()->profile ? Auth::user()->profile->name : '-' }}</th>
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">居住地</label><br>
              {{-- <th>{{ Auth::user()->profile->residence->name }}</th> --}}
              <th>{{ Auth::user()->profile ? Auth::user()->profile->residence->name : '-' }}</th>
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label for="birthday" class="form-label">生年月日</label><br>
              <th>{{ Auth::user()->profile->birth01 }}</th>
            <label for="InputName1">年</label>

              <th>{{ Auth::user()->profile->birth02 }}</th>
            <label for="InputName1">月</label>

              <th>{{ Auth::user()->profile->birth03 }}</th>
            <label for="InputName1">日</label>
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">休日</label><br>
              <th>{{ Auth::user()->profile->holidaystr() }}</th>
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">ゲームの頻度</label><br>
              <th>{{ Auth::user()->profile->frequency->name }}</th>
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">所持ゲーム</label><br>
            {{-- {!! nl2br(htmlspecialchars(変数名)) !!}→htmlspecialchars()でタグを無効化した後に、nl2br()の処理が行われる --}}
            <th>{!! Auth::user()->profile ? nl2br(htmlspecialchars(Auth::user()->profile->consolestr())) : '-' !!}</th>
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">興味のあるジャンル</label><br>
            {{-- <th>{{ Auth::user()->profile->genrestr() }}</th> --}}
            <th>{!! Auth::user()->profile ? nl2br(htmlspecialchars(Auth::user()->profile->genrestr())) : '-' !!}</th>
            {{-- @foreach($profiles as $profile)
              <th>{{ $profile->genre->name}}</th>
            @endforeach --}}
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label for="game_code" class="form-label">PSPIN/フレンドコードetc...</label><br>
              <th>{{ Auth::user()->profile->game_code01 }}</th>
              <th>{{ Auth::user()->profile->game_code02 }}</th>
          </div>
        </div>
        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">チャット機能</label><br>
              <th>{{ Auth::user()->profile->chat_flag ? 'ON' : 'OFF' }}</th>
          </div>
        </div>
        <div class="form-group row">
          <label class="form-label">自己紹介</label><br>
              {{-- <th>{{ Auth::user()->$profile->introduction }}</th> --}}
              <th>{{ Auth::user()->profile ? Auth::user()->profile->introduction : '-' }}</th>
        </div>
        {{ csrf_field() }}
        <a href="{{ route('profile') }}"><input type="submit" class="btn btn-primary" value="保存"></a>
      </form>
    </div>
  </div>
</div>
@endsection
