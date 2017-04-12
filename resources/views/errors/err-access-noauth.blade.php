@extends('errors.err-layout')

@section('err-title')
アクセスエラー
@endsection

@section('err-wording')
  このページはログインしないと見ることができません。 Googleアカウントでログインしてください。
@endsection

@section("err-btn")
<a href="{{ route('sociallogin', [ 'redirect_url' => Request::url() ]) }}" class="login-btn button marginB20">
      <i class="fa fa-google" aria-hidden="true"></i>
      <span>ログイン / 新規登録</span>
</a>
<a href="{{ route('landing') }}" class="button save">トップへ戻る</a>
@endsection