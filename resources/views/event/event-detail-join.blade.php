@extends('event.event-detail-layout')
@section('subscription')
  {{ Form::open(['route' => ['post-event-cancel', $event->code] ]) }}
    <button type="submit" class="button cancell">キャンセル</button>    
  {{ Form::close() }}
@endsection