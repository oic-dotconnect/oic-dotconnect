@extends('layout.app')

@section('content')
  <div class = "wrapper">
    <div class = "top">
      <h1>アカウント登録確認s</h1>
    </div>
    <div class = "register-step">
      <div class = "item">
        項目１
      </div>
      <i class="fa fa-arrow-right" aria-hidden="true"></i> 
      <div class = "item">
        項目２
      </div>
      <i class="fa fa-arrow-right" aria-hidden="true"></i>
      <div class = "item">
        項目３
      </div>      
    </div>
    <div class="conf-messege">
      以下のアカウント情報で登録します。
    </div>
    <div class = "register-form">
      <div class = "form-cat">
        <div class = "form-item">
          <h2 class = "form-header">ニックネーム</h2>
          <p class="form-info">{{$profile["name"]}}</p>
        </div>
      </div>
      <div class = "form-cat">
        <div class = "form-item">
          <h2 class = "form-header">ユーザコード</h2>
          <p class="form-info">{{$profile["code"]}}</p>
        </div>
      </div>
      <div class = "form-cat">
        <div class = "form-icon-item">
          <h2 class = "form-header">アイコン</h2>
        </div>
        <div class = "form-icon">
          <img src="{{ explode('public',$icon)[1] }}" alt="">
        </div>
      </div>
      <div class = "form-cat">
        <div class = "form-item">
          <h2 class = "form-header">紹介文</h2>
        </div>
        <p class="form-info">{{$profile["introduction"]}}</p>
      </div>
      <div class="form-page-move">
        <button type="button">プロフィール編集</button>
      </div>
    </div>
    <div class="register-fav">
      <h2 class="form-header">お気に入りタグ</h2>
      <div class="form-fav-tag">
        	@foreach ($tags as $tag)
            <p>{{ $tag }}</p>
          @endforeach
      </div>
      <div class="form-page-move">
      <button type="button">お気に入りタグ編集</button>
      </div>
    </div>
    <div class = "form-cont">
      <div class = "cont_conf">
        <button type="button">キャンセル</button>
      </div>
      <div class = "cont_can">
      {{ Form::open(['route' => 'post-user-create'])}}
        <button type="submit">登録</button>
      {{ Form::close()}}
    </div>
  </div>
@endsection