@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('/css/user-entry-profile.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
<div class = "wrapper">
  	<div class = "top">
      <h1>タイトル</h1>
    </div>
    <div class = "register-step">
      <div class = "item">
        項目１
      </div>
      <p>→</p>
      <div class = "item">
        項目２
      </div>
      <p>→</p>
      <div class = "item">
        項目３
      </div>      
    </div>
    <div class = "register-form">
      <div class = "form-cat">
        <div class = "form-item">
          <h2>ニックネーム</h2>
          <p>必須</p>
        </div>
          <input type = "text" name = "name_input" >
      </div>
      <div class = "form-cat">
        <div class = "form-item">
          <h2>ユーザコード</h2><p>必須</p>
        </div>
        <input type = "text" name = "user_code_input" >
      </div>
      <div class = "form-cat">
        <div class = "from-icon-item">
          <h2>アイコン</h2>
        </div>
          <div class = "form-icon">
            <div class = "img"></div>
            <button type="button">参照</button>
          </div>
      </div>
      <div class = "form-cat">
        <div class = "form-item">
          <h2>紹介文</h2>
        </div>
        <textarea name="into" rows="10" cols="60">ここに感想を記入してください。</textarea>
      </div>
      <div class = "tag_page_move">
        <button type="button">
          お気に入りページへ
        </button>
      </div>
      <div class = "note">
        <p>※ 文言</p>
      </div>
      <div class = "cont">
      <div class = "cont_conf">
        <button type="button">キャンセル</button>
      </div>
      <div class = "cont_can">
        <button type="button">確認</button>
      </div>
      </div>
    </div>
@endsection