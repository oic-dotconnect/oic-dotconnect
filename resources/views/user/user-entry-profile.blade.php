@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-common.css')}}}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-profile.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
  <div class="wrapper">
    @include('components.user-entry-step', [ 'current' => 'profile' ])
    <h1 class="user-entry-title">プロフィール登録</h1>
    {{ Form::open([
      'route' => 'post-user-entry-profile',
      'class' => 'row register-form',
      'files' => true
    ])}}
      <div class="col">

        <div class="row" style="margin-bottom:20px">
          <div class="col icon-col box input-form">        
            <h2 class="box-title red">アイコン</h2>        
            <div class="box-content">
              @if($icon === "")
                <img-show old-image=""></img-show>  
              @else
                <img-show old-image={{explode('public',$icon)[1]}}></img-show>
              @endif
              <input type="hidden" name="old_icon" value={{$icon}}> 
            </div>        
          </div>
          <div class="col name-col">
            <div class="user-name box input-form required">          
              <h2 class="box-title yellow">ニックネーム</h2>          
              <div class="name-input">
                <input type="text" class="border form-input" name="name" value={{$name}}>
              </div>
            </div>
            <div class="user-code box input-form required">          
              <h2 class="box-title green">ユーザコード</h2>        
              <div class="code-input">
                <input type="text" class="border form-input " name="code" value={{$code}}>
                <div class="caution">
                    <p class="caution-mark">※ユーザーコードは登録後変更できません</p>                    
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="introduction box">    
          <h2 class="box-title blue">紹介文</h2>    
          <div class="introduction-input">
            <textarea class="border" rows="10" cols="60" name="introduction">
              {{$introduction}}
            </textarea>
          </div>
        </div>

        <div class="row info">
          <div class="col">
            <div class="fav">
              <button type="submit" name="submit" value="toTag" class="fav-register button">お気に入りタグ登録へ</button>
              <p class="caution-mark">※文言</p>
            </div>
            <div class="row">
              <div class="info-left">
                <a href="#" class="button cancell left">キャンセル</a>
              </div>
              <div class="info-right">
                <button type="submit" name="submit" value="toConfirm" class="conf button right">入力確認へ</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- <form class="col register-form">-->
    {{ Form::close() }}
  </div>
@endsection