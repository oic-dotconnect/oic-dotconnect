@if($event->status === 'stop') <!-- イベント中止状態 -->
  <button type="button" disabled="disabled" class="button join">このイベントには参加できません</button>
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
      {{ $event->field}}
    @if ($event->status == "open")
      <button type="button" disabled="disabled" class="button join">参加する</button>
    @elseif ($event->field == "close")
      {{ Form::open(['route' => ['post-event-join', $event->code] ]) }}
        <button type="submit" class="button join" >参加する</button>
      {{ Form::close() }}
    @endif
  @endif
@endif