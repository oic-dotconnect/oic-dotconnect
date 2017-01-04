@extends('layout.app')

@section('head')
  <link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-common.css')}}}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-profile.css')}}}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{{asset('css/user-setting/user-setting-common.css')}}}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{{asset('css/user-setting/user-setting-profile.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
  <div class = "wrapper">  
    <h1 class="user-setting-title">ユーザー設定</h1>
    @include('components/user-setting-menu', [ 'current' => 'profile' ])    
    {{ Form::open([
      'route' => 'post-user-setting-profile',
      'class' => 'row register-form',
      'files' => true
    ])}}
      <div class="col">
        <div class="row" style="margin-bottom:20px">
          <div class="col icon-col box input-form">        
            <h2 class="box-title red">アイコン</h2>        
            <div class="box-content">              
              <img-show old-image={{ $user->icon_url }}></img-show>              
              <input type="hidden" name="old_icon" value={{ $user->icon_url }}> 
            </div>        
          </div>
          <div class="col name-col">
            <div class="user-name box input-form">          
              <h2 class="box-title yellow">ニックネーム</h2>          
              <div class="name-input">
                <input type="text" class="border form-input" name="name" value={{ $user->name }}>
              </div>
            </div>
            <div class="user-code box input-form">          
              <h2 class="box-title green">ユーザコード</h2>        
              <div class="code-input">
                <p>{{ $user->code }}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="introduction box">    
          <h2 class="box-title blue">紹介文</h2>    
          <div class="introduction-input">
            <textarea class="border" rows="10" cols="60" name="introduction">
              {{ $user->introduction }}
            </textarea>
          </div>
        </div>

        <div class="row info">
          <div class="col">          
            <div class="row">
              <div class="info-left">
                <a href="{{ route('user-mypage-recommend') }}" class="button cancell left">キャンセル</a>
              </div>
              <div class="info-right">                
                <button type="submit" class="conf button right">変更</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- <form class="col register-form">-->
    {{ Form::close() }}  
  </div>
@endsection
