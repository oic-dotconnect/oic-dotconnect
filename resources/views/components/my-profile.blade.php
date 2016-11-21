{{--  マイページのプロフィール部分 --}}

<div class="profile-inner">
	<h2>プロフィール</h2>
	<p class="profile-icon">
		<img src={{ Auth::user()->image_pass }} alt="">
	</p>
	<h3>
		<p>{{ Auth::user()->name }}</p>
	</h3>
	<p>
		<h5>{{ Auth::user()->code }}</h5>
	</p>
	<p> {{ Auth::user()->introduction }}</p>
	{!! link_to_route('user-setting-profile', 'アカウント設定ページへ') !!}
</div>