
<div class="profile">
    <div class="left-image">

    </div>
    <div class="right">
        <div class="top-username">
            {{ $user->name }}
        </div>
        <div class="center-tags">
            <section>
                <h5>興味のあるタグ：</h5>
                <div class="tags">
                    @foreach( $user->tags as $tag)
                        <a href="#">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </section>
        </div>
        <div class="bottom-introduction">
            <p>
                女の子大好きです。よろしく！
            </p>
        </div>
        <div class="button">
            <a href="#">プロフィール変更</a>
        </div>
    </div>
</div>
