@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-common.css')}}}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-conf.css')}}}" media="screen" title="no title" charset="utf-8">  
  <link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-profile.css')}}}" media="screen" title="no title" charset="utf-8">  
@endsection

@section('content')
  <div class = "wrapper">
    @include('components.user-entry-step', [ 'current' => 'confirm' ])
    <h1 class="user-entry-title">入力情報確認</h1>
    <div class="conf-messege">
      以下のアカウント情報で登録します。
    </div>
    <div class="conf-profile">
      <div class="row">
        <div class="col icon-col box">        
          <h2 class="box-title red">アイコン</h2>        
          <div class="icon-display">
            <div class="icon">
              <img src="{{ explode('public',$icon)[1] }}" alt="">
            </div>
          </div>          
        </div>         
        <div class="col name-col">
          <div class="user-name box">          
            <h2 class="box-title yellow">ニックネーム</h2>          
            <div class="name">
              <p class="input-info">{{$profile["name"]}}</p>
            </div>
          </div>
          <div class="user-code box">          
            <h2 class="box-title green">ユーザコード</h2>          
            <div class="code">
              <p class="input-info">{{$profile["code"]}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="introduction box" style="margin-top: 20px">      
        <h2 class="box-title blue">紹介文</h2>      
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

    <div class="conf-tag">
      <div class="box">
        <h2 class="box-title purple">お気に入りタグ</h2>
        <div class="candidate-tag-list">
          @foreach ($tags as $tag)
            <wbr><p class="tag">{{ $tag }}</p><wbr>
          @endforeach        
        </div>      
      </div>      
      <div class="info page-move">
        <a href="{{ route('user-entry-tag') }}" class="button tag-move">お気に入りタグを編集する</a>        
      </div>
    </div>

    <div class="row info">
      <div class="info-left">        
        <a href="{{ route('user-entry-cancel') }}" class="button cancell">キャンセル</a>      
      </div>
      <div class="info-right">        
        {{ Form::open(['route' => 'post-user-create'])}}
          <button type="submit" class="conf button">登録</button>
        {{ Form::close()}}
      </div>
    </div>    
  </div>
@endsection