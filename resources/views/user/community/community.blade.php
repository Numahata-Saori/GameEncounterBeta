@extends('layouts.app')

@section('content')
コミュニティ

<div class="com-1">
  <div>
    人気
  </div>
  <div class="comlayout">
    <h2 class="comlayout">GAME CONSOLE</h2>
    <ul class="comlayout-gallery">
      @foreach($consoles as $console)
        <li>
          <div class="card btn-light {{ $console->btn_color }} btnShape">
            {{-- <h5 class="com-btn-2">{{ $console->name }}</h5> --}}
            <a class="comlayout-btnName comlayout-btnNameSize1 btnripple" href="{{ route('community_genre', ['console_id'=>$console->id]) }}">{{ $console->name }}</a>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
</div>


@endsection
