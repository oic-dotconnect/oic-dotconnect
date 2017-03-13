<header class="header">
    <div class="header-inner">
        <div class="header-inner__item">
            <h1 class="header-inner__item--logo"><a href="{{ route('landing') }}">.Linker</a></h1>
        </div>
        <!-- /header-inner__item -->
        <div class="header-inner__item">
            @if( Auth::check() )
            <div class="event-action-btns">
                <a href="{{ route('user-event-control') }}" class="red">イベント管理</a>
                <a href="{{ route('event-entry') }}" class="light-gray">イベント作成</a>
            </div>
            <header-icon>
                <div class="icon" slot="icon">
                    <img src="{{ Auth::user()->iconMinPath() }}">
                </div>
                <div slot="menu" class="user-menu-item"><a href="{{ route('user-mypage') }}">マイページ</a></div>
                <div slot="menu" class="user-menu-item"><a href="{{ route('user-setting-profile') }}">ユーザー設定</a></div>  
                <div slot="menu" class="user-menu-item"><a href="{{ route('logout') }}">ログアウト</a></div>    
            </header-icon>                       
            @else 
            <a href="{{ route('sociallogin') }}" class="header-inner__item--login">
                <i class="fa fa-google" aria-hidden="true"></i>
                <span>ログイン / 新規登録</span>
            </a>
            <!-- /header-inner__item--login -->
            @endif
        </div>
        <!-- /header-inner__item -->
    </div>
    <!-- /.headerInner -->    
</header>
<!-- /.header -->
