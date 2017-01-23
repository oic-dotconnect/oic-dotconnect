{{--  ユーザ-ページのプロフィール部分 --}}
<div class="col box my-prof">
  <h2 class="box-title red">プロフィール</h2>
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
      @if( Auth::user()->isFavorite($user) )
        <a class="button button-orange d-block block-center mt-20" href="{{ route('remove-favorite-user', [ 'user_code' => $user->code ]) }}">フォローを解除する</a>        
      @else
        <a class="button button-orange d-block block-center mt-20" href="{{ route('add-favorite-user', [ 'user_code' => $user->code ]) }}">フォローする</a>
      @endif
    </div>
  </div>
</div>