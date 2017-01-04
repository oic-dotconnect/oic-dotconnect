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
        <!-- top -->
        <div class="state">
        </div>
        <div class="primary">
            <div class="inner">
                @include('components/user-setting-menu', [ 'current' => 'tag' ])                
                <div class="acount-config">
                    <div class="tag-search">
                        <h2>お気に入りタグ</h2>
                        タグ検索：<input type="text" name="search-input">
                    </div>
                    <!--tag-search-->
                    <div class="candidate-tag-list">
                        <h2>候補タグ一覧</h2>
                        <input type="checkbox" name="タグ名" class="candidate-item" value="タグ名">タグ名
                        <input type="checkbox" name="タグ名" class="candidate-item" value="タグ名">タグ名
                        <input type="checkbox" name="タグ名" class="candidate-item" value="タグ名">タグ名
                        <input type="checkbox" name="タグ名" class="candidate-item" value="タグ名">タグ名
                        <input type="checkbox" name="タグ名" class="candidate-item" value="タグ名">タグ名
                    </div>
                    <!--candidate-tag-list-->
                    <div class="add-candidate-tag-list">
                        <h2>追加するタグ一覧</h2>
                        <input type="checkbox" name="タグ名" class="add-candidate-item" value="タグ名">タグ名
                        <input type="checkbox" name="タグ名" class="add-candidate-item" value="タグ名">タグ名
                        <input type="checkbox" name="タグ名" class="add-candidate-item" value="タグ名">タグ名
                        <input type="checkbox" name="タグ名" class="add-candidate-item" value="タグ名">タグ名
                        <input type="checkbox" name="タグ名" class="add-candidate-item" value="タグ名">タグ名
                    </div>
                    <div class="add-candidate-tag-list">
                        <h2>お気に入りタグ一覧</h2>
                        <input type="checkbox" name="タグ名" class="add-candidate-item" value="タグ名">タグ名
                        <input type="checkbox" name="タグ名" class="add-candidate-item" value="タグ名">タグ名
                        <input type="checkbox" name="タグ名" class="add-candidate-item" value="タグ名">タグ名
                        <input type="checkbox" name="タグ名" class="add-candidate-item" value="タグ名">タグ名
                        <input type="checkbox" name="タグ名" class="add-candidate-item" value="タグ名">タグ名
                    </div>


                    <div class="btn-group">
                        <button>キャンセル</button>
                        <button>変更</button>
                    </div>
                    <!-- btn-group -->
                </div>
                <!--acount-config-->
            </div>
            <!-- inner -->
        </div>
        <!-- primary -->
    </div>
    <!-- wrapper -->
    {{Auth::user()->tags}}
@endsection