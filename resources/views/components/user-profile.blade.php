{{--  ユーザ-ページのプロフィール部分 --}}
<div class="col box my-prof">
  <h2>プロフィール</h2>
  <div class="my-prof-content">
    <div class="icon-display">
      <div class="icon">
        <img src={{ $user->iconPath() }} alt="">
      </div>
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
</div>