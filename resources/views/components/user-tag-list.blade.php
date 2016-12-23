<div class="row item-box my-fav-tag">
  <div class="tag-list">
    <h2>お気に入りタグ一覧</h2>
    <div class="candidate-tag-list">
      @foreach($tags as $tag)
        <a href="{{ route('event-search',[ 'tags' => $tag->name ]) }}" class="tag">{{ $tag->name }}</a>
      @endforeach
    </div>
  </div>
  <div><a href="#">もっとみる</a></div>
</div>