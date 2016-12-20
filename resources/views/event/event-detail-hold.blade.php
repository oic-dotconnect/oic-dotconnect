@extends('event.event-detail-layout')

@section('hold')
@if ($event[0]->status == "open")
<a>イベント編集</a>
<button>イベント中止</button>
@elseif ($event[0]->field == "close")
<a>イベント編集</a>
<button>イベント公開</button>
@endif
@endsection

@section('subscription')
@if ($event[0]->status == "open")
<button type="button" disabled="disabled">申し込み</button>
@elseif ($event[0]->field == "close")
<button type="button" >申し込み</button>
@endif

@endsection