{{--  ユーザ-ページのプロフィール部分 --}}

<div class="profile-inner">
	<h2>プロフィール</h2>
	<p class="profile-icon">
		<img src={{ $user->image_pass }} alt="">
	</p>
	<h3>
		<p>{{ $user->name }}</p>
	</h3>
	<p>
		<h5>{{ $user->code }}</h5>
	</p>
	<p> {{ $user->introduction }}</p>
</div>