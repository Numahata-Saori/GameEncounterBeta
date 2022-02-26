@extends('layouts.app')

@section('content')
{{-- {{ route('#') }} --}}

<div class="com-1">
  <div class="comlayout">

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-color">
        <li class="breadcrumb-item"><a href="{{ route('community') }}">CONSOLE</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('community_genre', ['console_id'=>$console->id]) }}">GENRE</a></li>
      </ol>
    </nav>

    <h2 class="comlayout">GAME GENRE</h2>
    <div>
      <ul class="comlayout-gallery">
      @foreach($genres as $genre)
        <li>
          <div class="card btn-light {{ $genre->btn_color }} btnShape">
            {{-- <h5 class="comlayout-btnName">{!! nl2br(e($genre->name)) !!}</h5> --}}
            <a class="comlayout-btnName btnripple" href="{{ route('community_genre_list', ['console_id'=>$console->id, 'genre_id'=>$genre->id]) }}">{!! nl2br(e($genre->name)) !!}</a>
          </div>
        </li>
      @endforeach
      </ul>
    </div>
  </div>
</div>


@endsection
