@extends('layout.app')

@section('head')
<link rel="stylesheet" href="{{{asset('/assets/css/landing.css')}}}" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="{{{asset('/assets/css/event.css')}}}" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="{{{asset('/assets/css/tag.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
<div class="top">
    <div class="field">
        IT
    </div>
    <div class="title">
        laravel勉強会
    </div>
    <div class="tags">
        <div class="tag">
            PHP
        </div>
    </div>
    <div class="date">
        日時：2016/09/05(月) 19:30 ~ 21:30
    </div>
    <div class="place">
        開催地：9D-1
    </div>
    <div class="capacity">
        定員：23/30人
    </div>
    <div class="button">
        <a href="#">参加する</a>
    </div>
</div>
<div class="bottom">
    <section>
        <h1 class="headingr">イベント内容</h1>
        <div class="description">
            <h2>laravel勉強会</h2>
            リファレンス本の読破を試してみたり、気になっていた機能を試してみたり。
    時間の最後には全体で結果発表などをして、情報共有できればと思います。
    普段なかなか手が付けられないような事をちょっと試してみる、 そういう場として役立てて貰えれば幸いです
    初心者さんでも歓迎。laravelに関する質問など、 可能な範囲で対応します！
        </div>
    </section>
    <div class="button">
        <a href="#">参加する</a>
    </div>
</div>
@endsection
