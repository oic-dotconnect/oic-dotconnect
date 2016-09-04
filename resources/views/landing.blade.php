@extends('layout.app')
@section('content')

<div class="image">

</div>
<div class="event">
    <section>
        <h1>新着イベント</h1>
        <div class="event-list">
            @foreach( $new_events as $event)
                @include('conponents.event',['event' => $event])
            @endforeach
        </div>
    </section>
    <section>
        <h1>開催予定イベント</h1>
        <div class="event-list">
            @foreach( $new_events as $event)
                @include('conponents.event',['event' => $event])
            @endforeach
        </div>
    </section>
</div>
<div class="hajimete">
    <h1>About</h1>
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
