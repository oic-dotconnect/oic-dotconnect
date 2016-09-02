@inject('eventservice','App\Services\EventService')

@section('event')
    <div class="event">
        <div class="left">
            <div class="year">
                {{ $eventservice->dateyear($event->start_date) }}
            </div>
            <div class="day">
                {{ $eventservice->dateday($event->start_date) }}
            </div>
            <div class="time">
                {{ $eventservice->datetime($event->start_time) }}~{{ $eventservice->datetime($event->end_time) }}
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
                <div class="condision">

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
