@extends('event.event-detail-layout')

@section('hold')
@if ($event->status == "open")
<a>イベント編集</a>
<button>イベント中止</button>
@elseif ($event->field == "close")
<a>イベント編集</a>
<button>イベント公開</button>
@endif
@endsection

@section('subscription')
@if ($event->status == "open")
<button type="button" disabled="disabled" class="button join">参加する</button>
@elseif ($event->field == "close")
<button type="button" class="button join" >参加する</button>
@endif

@endsection