<div class="row event-tab">
  <div class="event-tab-item {{ $current === 'join'? 'active': '' }}">
    <a href="{{route('user-page-join',['user_code' => $user_code]) }}" class="{{ $current === 'join'? 'active': '' }}">参加イベント</a>
  </div>
  <div class="event-tab-item {{ $current === 'hold'? 'active': '' }}">
    <a href="{{route('user-page-hold',['user_code' => $user_code]) }}" class="{{ $current === 'hold'? 'active': '' }}">開催イベント</a>
  </div>
</div>