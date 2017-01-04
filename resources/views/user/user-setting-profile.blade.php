@extends('layout.app')

@section('head')
  <link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-common.css')}}}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-profile.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
  <div class = "wrapper">  
    @include('components/user-setting-menu', [ 'current' => 'notice' ])
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
              <img-show old-image={{ Auth::user()->icon_url }}></img-show>              
              <input type="hidden" name="old_icon" value={{ Auth::user()->icon_url }}> 
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
                {{ Auth::user()->code }}
                <div class="caution">
                    <p class="caution-mark">※文言</p>
                    <p class="caution-mark">※文言</p>
                    <p class="caution-mark">※文言</p>
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
            <div class="row">
              <div class="info-left">
                <a href="#" class="button cancell left">キャンセル</a>
              </div>
              <div class="info-right">
                <button type="submit" name="submit" value="toConfirm" class="conf button right">変更</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- <form class="col register-form">-->
    {{ Form::close() }}
    <div class = "inner">
      <div class = "register-form">
        <h1>プロフィール</h1>
        <div class = "form-cat">
          <div class = "form-item">
            <h2 class = "form-header">ユーザーコード</h2>
          </div>
          <p>{{ Auth::user()->code }}</p>
        </div>
        <div class = "form-cat">
          <div class = "form-item">
            <h2 class = "form-header">ニックネーム</h2>
          </div>
          <input type = "text" name = "user_code_input" value={{ Auth::user()->name }} >
        </div>
        <div class = "form-cat">
          <div class = "form-icon-item">
            <h2 class = "form-header">アイコン</h2>
          </div>
          <div class = "form-icon">
              <div class = "img"><img src={{ Auth::user()->image_pass }}></div>
              <button type="button">参照</button>
            </div>
        </div>
        <div class = "form-cat">
          <div class = "form-item">
            <h2 class = "form-header">紹介文</h2>
          </div>
          <textarea name="into" rows="10" cols="60">{{ Auth::user()->introduction }}</textarea>
        </div>
        <div class = "form-cont">
          <div class = "cont_conf">
            <button type="button">キャンセル</button>
          </div>
          <div class = "cont_can">
            <button type="submit">変更</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
