@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-common.css')}}}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-conf.css')}}}" media="screen" title="no title" charset="utf-8">  
@endsection

@section('content')
  <div class = "wrapper">
    @include('components.user-entry-step', [ 'current' => 'confirm' ])
    <div class="conf-messege">
      以下のアカウント情報で登録します。
    </div>
    <div class="col register-prof">
      <h1 class="form-header">プロフィール</h1>
      <div class="row">
        <div class="col icon-col">
          <div class="name-title">
            <h2 class="form-header">アイコン</h2>
          </div>
          <div class="icon-display">
            <img src="{{ explode('public',$icon)[1] }}" alt="">
          </div>          
        </div>         
        <div class="col name-col">
          <div class="user-name">
            <div class="name-title">
              <h2 class="form-header">ニックネーム</h2>
            </div>
            <div class="name">
              <p class="input-info">{{$profile["name"]}}</p>
            </div>
          </div>
          <div class="col user-code">
            <div class="name-title">
              <h2 class="form-header">ユーザコード</h2>
            </div>
            <div class="code">
              <p class="input-info">{{$profile["code"]}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col introduction">
        <div class="name-title">
          <h2 class="form-header">紹介文</h2>
        </div>
        <div>
          <p class="input-info">
            {{$profile["introduction"]}}
          </p>
        </div>
      </div>
      <div class="info page-move">
        <a href="{{ route('user-entry-profile') }}" class="button prof-move">プロフィールを編集する</a>        
      </div>
    </div>  
    <div class="col register-fav">
      <h1 class="form-header">お気に入りタグ</h1>
      <div class="candidate-tag-list">
        @foreach ($tags as $tag)
          <wbr><p class="tag">{{ $tag }}</p><wbr>
        @endforeach        
      </div>
      <div class="info page-move">
        <a href="{{ route('user-entry-tag') }}" class="button tag-move">お気に入りタグを編集する</a>        
      </div>
    </div>
    <div class="row info">
      <a href="{{ route('user-entry-cancel') }}" class="button cancell">キャンセル</a>      
      {{ Form::open(['route' => 'post-user-create'])}}
        <button type="submit" class="conf">登録</button>
      {{ Form::close()}}
    </div>    
  </div>
@endsection