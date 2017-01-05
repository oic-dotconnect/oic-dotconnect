<header class="header">
      <div class="header-inner">
        <div class="header-left">
          <span class="logo"><a href="{{ route('landing') }}">.Linker</a></span>
        </div>
        <div class="header-center">
          {{ Form::open(['route' => 'event-search', 'method' => 'GET', 'class' => 'search-form'])}}          
            <div class="input">
              <input type="text" name="title" value="" placeholder="Web">
            </div>
            <button type="submit" class="search-btn button orange">検索</button>        
          {{ Form::close() }}
        </div>
        <div class="header-right">
          @if( Auth::check() )
            <div class="event-action-btns">
              <a href="{{ route('event-control') }}" class="red">イベント管理</a>
              <a href="{{ route('event-entry') }}" class="light-gray">イベント作成</a>
            </div>
            <a href="{{ route('user-mypage-recommend') }}">
              <div class="icon">
                <img src="{{ Auth::user()->iconMinPath() }}">
              </div>        
            </a>
          @else 
            <a href="{{ route('sociallogin') }}" class="login-btn">
              <i class="fa fa-google" aria-hidden="true"></i>
              <span>ログイン / 新規登録</span>
            </a>
          @endif
        </div>
      </div>
    </header>