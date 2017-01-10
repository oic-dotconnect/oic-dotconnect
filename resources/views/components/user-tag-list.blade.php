<div class="col box my-fav-tag">
  <h2 class="box-title yellow">お気に入りタグ一覧</h2>  
  <div class="my-fav-tag-content">
    <div class="tag-list">
      <div class="candidate-tag-list">
        @foreach($tags as $tag)
          <a href="{{ route('event-search',[ 'tags' => $tag->name ]) }}" class="tag">{{ $tag->name }}</a>
        @endforeach
      </div>
    </div>
  </div>
</div>