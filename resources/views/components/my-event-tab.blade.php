<ul class="nav nav-tabs nav-justified">
    <li class=" {{ $current === 'recommend'? 'active': '' }} ">
        <a href="{{route('user-mypage-recommend')}}">おすすめ</a>
    </li>
    <li class="{{ $current === 'join'? 'active': '' }}">
        <a href="{{route('user-mypage-join')}}">参加</a>
    </li>
    <li class="{{ $current === 'hold'? 'active': '' }}">
        <a href="{{route('user-mypage-hold')}}">開催</a>
    </li>
</ul>