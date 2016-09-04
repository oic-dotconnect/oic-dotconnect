@extends('layout.app')

@section('head')
<link rel="stylesheet" href="{{{asset('/assets/css/landing.css')}}}" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="{{{asset('/assets/css/event.css')}}}" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="{{{asset('/assets/css/tag.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
<div class="top-image">
  <img src="{{{asset('1.jpg')}}}" alt="" />
  <div class="top-logo">
    <div>
      <img src="{{{asset('logo2.png')}}}" alt="" />
    </div>
    <p>
      人と人を繋ぎ、輪を広げていく
    </p>
  </div>
</div>
<div class="event-section">
    <section>
        <h1 class="heading">新着イベント</h1>
        <div class="event-list">
            @foreach( $new_events as $event)
                @include('conponents.event',['event' => $event])
            @endforeach
        </div>
    </section>
    <section>
        <h1 class="heading">開催予定イベント</h1>
        <div class="event-list">
            @foreach( $new_events as $event)
                @include('conponents.event',['event' => $event])
            @endforeach
        </div>
    </section>
</div>
<div class="about-section">
    <h1 class="heading">.Linkerとは？</h1>
    イベントを開催しています
</div>
<div class="side">
    <section>
        <h1>サイド新着イベント</h1>
        @foreach( $new_events as $event)
            @include('conponents.side-event',['event' => $event])
        @endforeach
    </section>
</div>
@endsection
