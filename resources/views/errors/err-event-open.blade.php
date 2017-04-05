@extends('errors.err-layout')

@section('err-title')
公開エラー
@endsection

@section('err-wording')
<p>
  公開に必要な情報が入力されていません。 以下の項目を入力してください。
</p>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
@endsection

@section("err-btn")
<a href="{{ route('event-edit', ['event_code' => $code]) }}">編集ページへ</a>
<a href="{{ route('landing') }}" class="button save">トップへ戻る</a>
@endsection