@extends('layouts.app')

@section('content')
コミュニティ

<div class="com-1">
  <div>
    人気
  </div>
  <div class="com-3">
    <h2 class="com-5">GAME CONSOLE</h2>
    <ul class="com-2">
      @foreach($consoles as $console)
        <li>
          <div class="card btn-light {{ $console->btn_color }} com-btn-1">
            <h5 class="com-btn-2">{{ $console->name }}</h5>
            <a class="Link" href="{{ route('community_genre', ['console_id'=>$console->id]) }}"></a>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
</div>


@endsection
