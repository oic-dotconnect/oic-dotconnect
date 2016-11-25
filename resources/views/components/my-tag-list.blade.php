<div class="favorite-inner">
	<div>
		<h2>お気に入りタグ</h2>
	</div>
	<div class="favorite-tag">
		@foreach($tags as $tag)
			{!! link_to_route('event-search', $tag->name, [ 'tags' => [ $tag->name ] ]) !!}
		@endforeach
	</div>
	<!-- favorite-tag -->
	<div><a href="#">もっとみる</a></div>
	<div>{!! link_to_route('user-setting-tag', 'お気に入りタグ編集ページへ') !!}</div>
</div>