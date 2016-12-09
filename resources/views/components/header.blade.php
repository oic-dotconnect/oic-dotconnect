<header class="header">
      <div class="header-left">
        <span class="logo">.Linker</span>
      </div>
      <div class="header-center">
        <form class="search-form">
          <div class="input">
            <input type="text" name="name" value="" placeholder="Web">
          </div>
          <button type="submit" class="search-btn button orange">検索</button>        
		    </form>
      </div>
      <div class="header-right">
        @if( Auth::check() )
          <div class="event-action-btns">
            <a href="" class="button red">イベント管理</a>
            <a href="" class="button light-gray">イベント作成</a>
          </div>
          <div class="icon">
            <img src="http://placekitten.com/640/340">
          </div>        
        @else 
          <a href="{{ route('user-entry-profile') }}" class="login-btn">
            <i class="fa fa-google" aria-hidden="true"></i>
            <span>ログイン / 新規登録</span>
          </a>
        @endif
      </div>
    </header>