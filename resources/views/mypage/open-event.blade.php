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
        <h1>過去に開催したイベント</h1>
    </section>
</div>
@endsection
