<h1>ページ一覧</h1>
<section>
	<h2>ユーザー登録</h2>
	<ul>
		<li><a href="{{ route('user-entry-profile') }}">プロフィール入力</a></li>
		<li><a href="{{ route('user-entry-tag') }}">お気に入りタグ選択</a></li>
		<li><a href="{{ route('user-entry-confirm') }}">入力内容確認画面</a></li>
	</ul>
</section>
<section>
	<h2>マイページ</h2>
	<ul>
		<li><a href="{{ route('user-mypage-recommend') }}">おすすめイベント</a></li>
		<li><a href="{{ route('user-mypage-join') }}">参加イベント</a></li>
		<li><a href="{{ route('user-mypage-hold') }}">主催イベント</a></li>
	</ul>
</section>
<section>
	<h2>ユーザーページ</h2>
	<ul>	
		<li><a href="{{ route('user-page-join', [ 'user_code' => App\Models\User::find(2)->code ]) }}">参加イベント</a></li>
		<li><a href="{{ route('user-page-hold', [ 'user_code' => App\Models\User::find(2)->code ]) }}">主催イベント</a></li>
	</ul>
</section>
<section>
	<h2>ユーザー設定</h2>
	<ul>	
		<li><a href="{{ route('user-setting-tag') }}">プロフィール設定</a></li>
		<li><a href="{{ route('user-setting-profile') }}">お気に入りタグ設定</a></li>
		<li><a href="{{ route('user-setting-notice') }}">通知設定</a></li>
		<li><a href="{{ route('user-setting-leave') }}">退会</a></li>
	</ul>
</section>
<section>
	<h2>イベント系</h2>
	<ul>	
		<li><a href="{{ route('event-entry') }}">イベント作成</a></li>
		<li><a href="{{ route('event-detail', [ 'event_code' => App\Models\Event::find(1)->code ]) }}">イベント詳細</a></li>
		<li><a href="{{ route('event-search') }}">イベント検索</a></li>
		<li><a href="{{ route('event-control') }}">イベント管理</a></li>
	</ul>
</section>