@inject('eventservice','App\Services\EventService')

@section('event')
    <div class="event">
        <div class="left">
            <div class="year">
                {{ $eventservice->dateYear($event->start_date) }}
            </div>
            <div class="day">
                {{ $eventservice->dateDay($event->start_date) }}
            </div>
            <div class="time">
                {{ $eventservice->dateTime($event->start_time) }}~{{ $eventservice->datetime($event->end_time) }}
            </div>
            <div class="place">
                {{ $event->place }}
            </div>
            <div class="field">
                {{ $eventservice->field($event->field) }}
            </div>
        </div>
        <div class="right">
            <div class="top">
                <div class="condition">
                    {{ $eventservice->condition($event->start_date,$event->start_time,$event->end_date,$event->end_time) }}
                </div>
            </div>
            <div class="center">
                <div class="title">
                    {{ $event->name }}
                </div>
            </div>
            <div class="bottom">
                @foreach($event->tags as $tag)
                <div class="tags">
                    {{ $tag }}
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
