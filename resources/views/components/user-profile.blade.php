{{--  ユーザ-ページのプロフィール部分 --}}
<div class="col item-box my-prof">
  <h2>プロフィール</h2>
  <div class="icon-display">
    <img src={{ Auth::user()->iconPath() }} alt="">
  </div>
  <div class="user-name">
    <div class="name">
      <p class="input-info">{{ $user->name }}</p>
    </div>
    <div class="code">
      <p class="input-info">{{ $user->code }}</p>
    </div>
    <div class="introduction">
      {{ $user->introduction }}
    </div>
  </div>
</div>