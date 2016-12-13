@extends('layout.app')

@section('content')
  <div class = "wrapper">
    <div class = "top">
      <h1>ユーザー設定</h1>
    </div>
    <div class = "inner">
        <div class="tag-list">
            <li class="tag-item">プロフィール</li>
            <li class="tag-item">お気に入りタグ</li>
            <li class="tag-item">メール通知</li>
            <li class="tag-item">退会</li>
        </div>
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
