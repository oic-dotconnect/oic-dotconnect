@extends('layout.app')

@section('head')	
@endsection

@section('content')
    <div class="my-page">
        <h1 class="heading">マイページ</h1>
        {{-- ユーザーの情報 --}}
        <div class="user-profile-area panel panel-red panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">プロフィール</h2>
            </div>
            <div class="panel-body user-info">
                <div class="user-info__icon">
                    <img src={{ Auth::user()->iconPath() }} alt="" class="icon">
                </div>
                <div class="user-info__name">
                    {{ Auth::user()->name }}
                </div>
                <div class="user-info__code">
                    &#64;{{ Auth::user()->code }}
                </div>
                <div class="user-info__introduction">
                    <p class="introduction__text">
                        {{ Auth::user()->introduction }}
                    </p>
                </div>
                {{-- アカウント設定画面へ　--}}
                <div class="user-action-area">
                    @include('components/links/account-setting')
                </div>
            </div>
        </div>
        {{-- ユーザーがお気に入りにしているタグ --}}
        <div class="user-fav-tags-area panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">お気に入りタグ</h3>
            </div>
            <div class="panel-body fav-tags">
                @foreach(Auth::user()->tags as $tag)
                    @include("components/tag", ["tag" => $tag ])
                @endforeach
            </div>
        </div>
        {{-- イベント --}}
        <div class="user-event-area panel">
            @yield("event-tab")
            <div class="tab-content">
                @foreach( $events as $event)
                    @include('components.event',['event' => $event])
                @endforeach
                {{$events->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
