@extends('layouts.app')

@section('content')

<div class="com-1">
  <div class="comlayout">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-color">
        <li class="breadcrumb-item"><a href="{{ route('community') }}">CONSOLE</a></li>
        <li class="breadcrumb-item"><a href="{{ route('community_genre', ['console_id'=>$console->id]) }}">GENRE</a></li>
        <li class="breadcrumb-item active" aria-current="page">GAME LIST</li>
      </ol>
    </nav>

    <h2 class="comlayout">GAME LIST</h2>
    <ul class="comlist-gallery">
    @foreach($communities as $community)
      <li>
        <div class="card btn-light btnx-list1 btnShape">
          {{-- <pre class="com-list-gallery-btn">{!! nl2br(e($community->name)) !!}</pre> --}}
          <a class="comlayout-btnName btnripple " href="{{ route('community_genre_list_detail', ['console_id'=>$console->id, 'genre_id'=>$genre->id, 'community_id'=>$community->id]) }}">{!! nl2br(e($community->name)) !!}</a>
        </div>
      </li>
    @endforeach
    </ul>
  </div>
</div>

@endsection
