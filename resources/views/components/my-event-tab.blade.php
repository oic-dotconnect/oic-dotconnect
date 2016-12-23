<div class="row event-tab">
  <div class="event-tab-item {{ $current === 'recommend'? 'active': '' }}">
    <a href="{{route('user-mypage-recommend')}}" class=" {{ $current === 'recommend'? 'active': '' }} ">おすすめイベント</a>
  </div>
  <div class="event-tab-item {{ $current === 'join'? 'active': '' }}">
    <a href="{{route('user-mypage-join')}}" class="{{ $current === 'join'? 'active': '' }}">参加イベント</a>
  </div>
  <div class="event-tab-item {{ $current === 'hold'? 'active': '' }}">
    <a href="{{route('user-mypage-hold')}}" class="{{ $current === 'hold'? 'active': '' }}">開催イベント</a>
  </div>
</div>