@extends('layout.app')

@section('head')
  <link rel="stylesheet" href="{{{asset('css/user-setting/user-setting-common.css')}}}" media="screen" title="no title" charset="utf-8">  
@endsection

@section('content')
    <div class="wrapper">
        <h1 class="user-setting-title">ユーザー設定</h1>
        <div class="top">
            <h1>アカウント設定</h1>
        </div>
        <div class="primary">
            <div class="inner">
                @include('components/user-setting-menu', [ 'current' => 'notice' ])
                <div class="acount-config">
                    <div class="withdrawal">
                        <h2>メール通知</h2>
                    </div>
                    <div class="wording">
                        <h2>・開催イベント</h2>
                        <p><input type="checkbox" name="join-nottification" value="join-nottification"> 参加通知</p>
                        <p>*</p>
                        <p><input type="checkbox" name="not-join-nottification" value="not-join-nottification"> 参加キャンセル通知</p>
                        <p>*</p>
                        <h2>・お気に入りタグ</h2>
                        <p><input type="checkbox" name="tag-regular-nottification" value="tag-regular-nottification"> 参加通知</p>
                        <p>*</p>
                        <p>個別タグ通知</p>
                        <p>*</p>
                        <div class="button-group">
                            <button>すべて解除</button>
                            <button>すべて選択</button>
                        </div>
                        @foreach(Auth::user()->tags as $tag)
                            <input type="checkbox" name="タグ名" class="candidate-item" value={{ $tag->id }}>{{ $tag->name }}
                        @endforeach
                    </div>
                    <div class="paging">
                        <a href="#">マイページへ戻る</a>
                        <button type="button">変更</button>
                    </div>
                </div>
                <!-- acoutn-config -->
            </div>
            <!-- inner -->
        </div>
        <!-- parimary -->
    </div>
@endsection

