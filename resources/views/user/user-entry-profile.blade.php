@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-common.css')}}}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-profile.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
  @include('components.user-entry-step', [ 'current' => 'profile' ])
  {{ Form::open([
    'route' => 'post-user-entry-profile',
    'class' => 'col register-form',
    'files' => true
  ])}}
  <!-- <form class="col register-form">-->
    <h1 class="form-title">プロフィール登録</h1>
    <div class="row">
      <div class="col icon-col">
        <div class="name-title">
          <h2>アイコン</h2>
        </div>
        <div>
          <img-show old-image={{explode('public',$icon)[1]}}></img-show>
          <input type="hidden" name="old_icon" value={{$icon}}> 
        </div>        
      </div>
      <div class="col name-col">
        <div class="user-name">
          <div class="name-title">
            <h2>ニックネーム</h2><p>必須</p>
          </div>
          <div class="name-input">
            <input type="text" class="border form-input" name="name" value={{$name}}>
          </div>
        </div>
        <div class="col user-code">
          <div class="name-title">
            <h2>ユーザコード</h2><p>必須</p>
        </div>
        <div class="code-input">
          <input type="text" class="border form-input " name="code" value={{$code}}>
          <div class="caution">
              <p class="caution-mark">※文言</p>
              <p class="caution-mark">※文言</p>
              <p class="caution-mark">※文言</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col introduction">
    <div class="name-title">
      <h2>紹介文</h2>
    </div>
    <div class="introduction-input">
      <textarea class="border" rows="10" cols="60" name="introduction">
        {{$introduction}}
      </textarea>
    </div>
  </div>
  <div class="col info">
    <div class="fav">
      <button type="submit" name="submit" value="toTag" class="fav-register">お気に入りタグ登録へ</button>
      <p class="caution-mark">※文言</p>
    </div>
    <div class="row info">
      <a href="#" class="button cancell">キャンセル</a>
      <button type="submit" name="submit" value="toConfirm" class="conf">入力確認へ</button>
    </div>
  {{ Form::close() }}
@endsection