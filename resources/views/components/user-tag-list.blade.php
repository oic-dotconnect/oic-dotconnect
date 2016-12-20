<div class="favorite-inner">
	<div>
		<h2>お気に入りタグ</h2>
	</div>
	<div class="favorite-tag">
	@foreach($tags as $tag)
		@include('components.tag', [ 'tag' => $tag ])
	@endforeach
	</div>
	<!-- favorite-tag -->
	<div><a href="#">もっとみる</a></div>
</div>