@inject('eventservice','App\Services\EventService')

<div class="event">
    <div class="left">
        <div class="status">
            <a href="#">非公開</a>
            <a href="#">公開する</a>
        </div>
    </div>
    <div class="center">
        <div class="top-title">
            {{ $event->name }}
        </div>
        <div class="center-date">
            開催日:{{ $eventservice->dateSide($event->start_date) }}
        </div>
        <div class="bottom">
            <a href="#">申込者一覧</a>
            <a href="#">申込者へメッセージを送る</a>
        </div>
    </div>
    <div class="right">
        <a href="#">編集する</a>
        <a href="#">削除する</a>
    </div>
</div>
