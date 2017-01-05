@inject('eventservice','App\Services\EventService')

<div class="event-item">
    <div class="event-date">
        <p>{{ $eventservice->dateYear($event->opening_date) }}年/{{ $eventservice->dateMonth($event->opening_date) }}月</p>
        <p class="date">{{ $eventservice->dateDay($event->opening_date) }}({{ $eventservice->dateWeek($event->opening_date) }})</p>
        <p>{{ $eventservice->dateTime($event->start_at) }}~{{ $eventservice->datetime($event->end_at) }}</p>
    </div>
    <!-- result-date -->
    <div class="event-state">
        <div class="event-field event-top {{ $event->field }}">{{ $eventservice->field($event->field) }}</div>
        <p class="state {{ $eventservice->conditionClass($event->opening_date,$event->start_at,$event->end_date,$event->end_at) }}">
            {{ $eventservice->condition($event->opening_date,$event->start_at,$event->end_date,$event->end_at) }}
        </p>
    </div>
    <!-- result-state -->
    <div class="event-detail">
        <div class="event-detail-left">
            <div class="event-top">
                <div class="event-name"><a href="{{ route('event-detail', [ 'event_code' => $event->code ]) }}">{{ $event->name }}</a></div>
                <div class="organizer"><a href="{{ route('user-page-join', [ 'user_code' => $event->organizer->code ]) }}"><img class="icon" src="{{ $event->organizer->icon_min_url }}" alt="">{{ $event->organizer->name }}</a></div>
            </div>
            <div class="tags">
                @foreach($event->tags as $tag)
                  @include('components.tag', [ 'tag' => $tag ])
                @endforeach                
            </div>
        </div>
        <div class="event-detail-right">
            <span class="capacity">{{ $event->entry_num() }}/{{ $event->capacity }}人</span>
        </div>
    </div>
</div>