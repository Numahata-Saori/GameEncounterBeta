@extends('layouts.app')

@section('content')
{{-- {{ route('#') }} --}}

<div class="com-1">
  <div class="com-3 com-4">
    <h2 class="com-5">GAME GENRE</h2>
    <ul class="com-2">
    @foreach($genres as $genre)
      <li>
        <div class="card btn-light {{ $genre->btn_color }} com-btn-1">
          <h5 class="com-btn-2">{!! nl2br(e($genre->name)) !!}</h5>
          <a class="Link" href="{{ route('community_genre_list', ['console_id'=>$console->id, 'genre_id'=>$genre->id]) }}"></a>
        </div>
      </li>
    @endforeach
    </ul>
  </div>
</div>


@endsection
