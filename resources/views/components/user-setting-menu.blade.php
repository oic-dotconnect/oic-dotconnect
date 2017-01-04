<div class="user-setting-menu-group">
	<ul class="user-setting-menu">
		<li class="menu-item {{ $current === 'profile'? 'selected': '' }}"><a href="{{ route('user-setting-profile') }}">プロフィール</a></li>
		<li class="menu-item {{ $current === 'tag'? 'selected': '' }}"><a href="{{ route('user-setting-tag') }}">お気に入りタグ</a></li>
		<li class="menu-item {{ $current === 'notice'? 'selected': '' }}"><a href="{{ route('user-setting-notice') }}">メール通知</a></li>
		<li class="menu-item {{ $current === 'leave'? 'selected': '' }}"><a href="{{ route('user-setting-leave') }}">退会</a></li>
	</ul>
	<!-- tag-list -->
</div>
<!-- tag-group -->