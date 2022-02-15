@extends('layouts.app')

@section('content')

<div class="com-1">
  <div class="com-3 com-5">
    <h2 class="com-5">GAME LIST</h2>
    <ul class="com-2">
    @foreach($communities as $community)
      <li>
        <div class="card btn-light btnx-list1 com-btn-1">
          <pre class="com-btn-2 com-btn-4">{!! nl2br(e($community->name)) !!}</pre>
          <a class="Link" href="{{ route('community_genre_list_detail', ['console_id'=>$console->id, 'genre_id'=>$genre->id, 'community_id'=>$community->id]) }}"></a>
        </div>
      </li>
    @endforeach
    </ul>
  </div>
</div>

@endsection
