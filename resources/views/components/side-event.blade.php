@inject('eventservice','App\Services\EventService')

<div class="event">
    <div class="left">
        <div class="field">
            {{ $eventservice->field($event->field) }}
        </div>
    </div>
    <div class="right">
        <div class="top">
            <div class="date">
                {{ $eventservice->dateSide($event->start_date) }}
            </div>
        </div>
        <div class="bottom">
            <div class="title">
                {{ $event->name }}
            </div>
        </div>
    </div>
</div>
