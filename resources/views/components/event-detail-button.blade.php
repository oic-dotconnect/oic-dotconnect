@inject('eventservice','App\Services\EventService')

@if($event->status === 'stop') <!-- イベント中止状態 -->
  <button type="button" disabled="disabled" class="button join">中止イベント</button>
@elseif($eventservice->conditionClass($event->opening_date,$event->start_at,$event->end_date,$event->end_at) === 'finished')
  <button type="button" disabled="disabled" class="button join">終了</button>
@else
  @if($current === 'join') <!-- 参加状態 -->
    {{ Form::open(['route' => ['post-event-cancel', $event->code] ]) }}
      <button type="submit" class="button cancell">キャンセル</button>    
    {{ Form::close() }}
  @elseif($current === 'viewer') <!-- 参加前状態 -->
    {{ Form::open(['route' => ['post-event-join', $event->code] ]) }}
      <button type="submit" class="button join" >参加する</button>
    {{ Form::close() }}
  @elseif($current === 'guest') <!-- ログインしていない状態 -->
    <a href="{{ route('sociallogin', [ 'redirect_url' => Request::url() ]) }}" class="login-btn">
      <i class="fa fa-google" aria-hidden="true"></i>
      <span>ログイン / 新規登録</span>
    </a>
  @elseif($current === 'hold') <!-- 開催者が見た状態 -->
    @if ($event->status == "open")
      <button type="button" disabled="disabled" class="button join">参加する</button>
    @elseif ($event->status == "close")
      <button type="submit" class="button join" >参加する</button>
    @endif
  @endif
@endif