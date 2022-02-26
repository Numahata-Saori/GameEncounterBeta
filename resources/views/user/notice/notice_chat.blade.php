@extends('layouts.app')

@section('content')
お知らせ
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" href={{ route('notice') }}>全体通知</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{ route('notice_nice-partner') }}>相手からいいね</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href={{ route('notice_chat') }}>チャット</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
@endsection
