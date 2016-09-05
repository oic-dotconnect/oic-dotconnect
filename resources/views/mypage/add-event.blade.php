@extends('layout.app')

@section('head')
<link rel="stylesheet" href="{{{asset('/assets/css/landing.css')}}}" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="{{{asset('/assets/css/event.css')}}}" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="{{{asset('/assets/css/tag.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
<div class="left">
    @include('mypage.user-info')
    <section>
        <h1>マイページ</h1>
        @include('mypage.my-menu')
    </section>
</div>
<div class="right">
    <section>
        <h1>イベント登録</h1>
        <div class="add-event">
            <form class="" action="" method="post">
                <div class="event-form">
                    <label for="name">イベント名:</label>
                    <input type="text" name="name" value="">
                </div>
                <div class="event-form">
                    <label for="name">カテゴリー:</label>
                    <select class="" name="">
                        <option value="">IT</option>
                        <option value="">デザイン</option>

                    </select>
                </div>
                <div class="event-form">
                    <label for="name">時間:</label>
                    <input type="text" name="name" value="">
                    <input type="text" name="name" value="">
                    <span>〜</span>
                    <input type="text" name="name" value="">
                </div>
                <div class="event-form">
                    <label for="name">場所:</label>
                    <select class="" name="">
                        <option value="">5-A</option>
                        <option value="">5-B</option>
                    </select>
                </div>
                <div class="event-form">
                    <label for="name">定員:</label>
                    <input type="text" name="name" value="">
                </div>
                <div class="event-form">
                    <label for="name">タグ:</label>
                    <input type="text" name="name" value="">
                </div>
                <div class="tags">

                </div>
                <div class="text">
                    <label for="">説明文タイトル:</label>
                    <input type="text" name="name" value="">
                    <label for="">詳細説明文:</label>
                    <textarea name="name" rows="8" cols="40"></textarea>
                </div>
                <a href="#">公開する</a>
                <a href="#">削除</a>
            </form>
        </div>
    </section>
</div>
@endsection
