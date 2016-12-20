@extends('errors.err-layout')

@section('err-title')
ログインエラー
@endsection

@section('err-wording')
<p>
  指定のGoogleアカウントではログインできません。<br> oic.jpまたはoic.ac.jpのGoogleアカウントでログインして下さい。
</p>
@endsection

@section("err-btn")
<a href="#">ログイン</a>
<div class="paging">
  <a href="#">トップへ戻る</a>
</div>
@endsection