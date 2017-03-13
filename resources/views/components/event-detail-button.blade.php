@inject('eventservice','App\Services\EventService')

@if($event->status === 'stop') <!-- イベント中止状態 -->
  <button type="button" disabled="disabled" class="btn stop disabled">中止イベント</button>
@elseif($eventservice->conditionClass($event) === 'finished')
  <button type="button" disabled="disabled" class="btn finish disabled">終了</button>
@else
  @if($current === 'join') <!-- 参加状態 -->
    {{ Form::open(['route' => ['post-event-cancel', $event->code] ]) }}
      <button type="submit" class="btn cancel">キャンセル</button>    
    {{ Form::close() }}
  @elseif($current === 'viewer') <!-- 参加前状態 -->
    @if( $eventservice->isBetweenRecruit($event) )
      {{ Form::open(['route' => ['post-event-join', $event->code] ]) }}
        <button type="submit" class="btn join" >参加する</button>
      {{ Form::close() }}
    @else
      <button type="button" disabled="disabled" class="btn disabled">募集期間外</button>
    @endif
  @elseif($current === 'guest') <!-- ログインしていない状態 -->
    <a href="{{ route('sociallogin', [ 'redirect_url' => Request::url() ]) }}" class="login-btn">
      <i class="fa fa-google" aria-hidden="true"></i>
      <span>ログイン / 新規登録</span>
    </a>
  @elseif($current === 'hold') <!-- 開催者が見た状態 -->    
    @if ($event->status == "open")
      @if( $eventservice->isBetweenRecruit($event) )        
        <button type="button" disabled="disabled" class="btn join">参加する</button>
      @else
        <button type="button" disabled="disabled" class="btn disabled">募集期間外</button>
      @endif
    @elseif ($event->status == "close")
      @if( $eventservice->isBetweenRecruit($event) )
        <button type="submit" class="btn join" >参加する</button>
      @else
        <button type="button" disabled="disabled" class="btn disabled">募集期間外</button>
      @endif
    @endif
  @endif
@endif