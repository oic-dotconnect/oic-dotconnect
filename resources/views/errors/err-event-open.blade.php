@extends('errors.err-layout')

@section('err-title')
公開エラー
@endsection

@section('err-wording')
<p>
  公開に必要な情報が入力されていません。 以下の項目を入力してください。
</p>
{{dd($errors)}}
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
@endsection

@section("err-btn")
<a href="#">編集ページへ</a>
<div class="paging">
  <a href="#">トップへ戻る</a>
</div>
@endsection