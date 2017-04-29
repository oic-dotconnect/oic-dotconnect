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
    <h2 class="user-setting-sub-title">プロフィール設定</h2>
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
                {{
                  Form::text('name', $user->name, [
                    "class" => "border form-input"
                  ])
                }}                
              </div>
            </div>
            @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->get('name') as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
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
          {{
            Form::textarea('introduction', $user->introduction, [
                'class' => 'border',
                'row' => 10,
                'col' => 60
            ])
          }}
          </div>
          @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->get('introduction') as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
        </div>

        <div class="row info">
          <div class="col">          
            <div class="row">
              <div class="info-left">
                <a href="{{ route('user-mypage-recommend') }}" class="button cancell left">キャンセル</a>
              </div>
              <div class="info-right">                
                <button type="submit" class="change button right">変更</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- <form class="col register-form">-->
    {{ Form::close() }}  
  </div>
@endsection
