@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('/css/my-page.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
<div class="row my-page">
  <div class="col my-info">
    @include('components/my-profile')
    @include('components/my-tag-list', [ 'tags' => Auth::user()->tags ])
  </div>
  <div class="col my-event">
  @yield("event-tab")
    <div class="col event-list">
      @foreach( $events as $event)
        @include('components.event',['event' => $event])
      @endforeach
      <div class="">
        {{$events->links()}}
      </div>
    </div>
  </div>
</div>

@endsection
