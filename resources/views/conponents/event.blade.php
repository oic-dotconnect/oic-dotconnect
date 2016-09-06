@inject('eventservice','App\Services\EventService')

<div class="event">
    <div class="left">
        <div class="year">
            {{ $eventservice->dateYear($event->start_date) }}
        </div>
        <div class="day">
            {{ $eventservice->dateDay($event->start_date) }}
        </div>
        <div class="time">
            {{ $eventservice->dateTime($event->start_at) }}~{{ $eventservice->datetime($event->end_at) }}
        </div>
        <div class="place">
            {{ $event->place }}
        </div>
        <div class="field {{ $event->field }}">
            <a href="#">{{ $eventservice->field($event->field) }}</a>
        </div>
    </div>
    <div class="right">

        <div class="top">
            <div class="condition {{ $eventservice->conditionClass($event->start_date,$event->start_at,$event->end_date,$event->end_at) }}">
                {{ $eventservice->condition($event->start_date,$event->start_at,$event->end_date,$event->end_at) }}
            </div>
        </div>
        <div class="center">
            <div class="title">
                <a href="#hoge">{{ $event->name }}</a>
            </div>
        </div>
        <div class="bottom">
          <div class="tags">
            @foreach($event->tags as $tag)
                <div class="tag">
                  <i class="fa fa-tag" aria-hidden="true"></i><a href="#">{{ $tag->name }}</a><i class="fa fa-star-o star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                </div>
            @endforeach
          </div>
        </div>
    </div>
  </div>
