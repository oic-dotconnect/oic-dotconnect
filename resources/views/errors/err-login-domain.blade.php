@extends('errors.err-layout')

@section('err-title')
ログインエラー
@endsection

@section('err-wording')
指定のGoogleアカウントではログインできません。<br> oic.jpまたはoic.ac.jpのGoogleアカウントでログインして下さい。
@endsection

@section("err-btn")
<a href="{{ route('sociallogin', [ 'redirect_url' => Request::url() ]) }}" class="login-btn button marginB20">
      <i class="fa fa-google" aria-hidden="true"></i>
      <span>ログイン / 新規登録</span>
</a>
<a href="{{ route('landing') }}" class="button save">トップへ戻る</a>
@endsection