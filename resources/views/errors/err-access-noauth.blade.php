@extends('errors.err-layout')

@section('err-title')
アクセスエラー
@endsection

@section('err-wording')
<p>
  このページはログインしないと見ることができません。 Googleアカウントでログインしてください。
</p>
@endsection

@section("err-btn")
<a href="#">ログイン</a>
<div class="paging">
    <a href="#">トップへ戻る</a>
</div>
@endsection