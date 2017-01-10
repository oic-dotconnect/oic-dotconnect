@extends('event.event-detail-layout')
@section('subscription')
{{ Form::open(['route' => ['post-event-join', $event->code] ]) }}
	<button type="submit" class="button join" >参加する</button>
{{ Form::close() }}
@endsection