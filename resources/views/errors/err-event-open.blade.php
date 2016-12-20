@extends('errors.err-layout')

@section('err-title')
公開エラー
@endsection

@section('err-wording')
<p>
  公開に必要な情報が入力されていません。 以下の項目を入力してください。
</p>
<ul>
  <li>開催日</li>
  <li>空き教室</li>
  <li>開始日</li>
  <li>定員</li>
</ul>
@endsection

@section("err-btn")
<a href="#">編集ページへ</a>
<div class="paging">
  <a href="#">トップへ戻る</a>
</div>
@endsection