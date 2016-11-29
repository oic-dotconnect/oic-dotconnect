@extends('layout.app')

@section('content')
<h1>MOCK お気に入りタグ登録ページ</h1>

{{Form::open(['route' => 'post-user-entry-tag'])}}
<input type="hidden" name="tags[]" value="1">
<input type="hidden" name="tags[]" value="2">
<input type="hidden" name="tags[]" value="3">
<input type="hidden" name="tags[]" value="4">
<input type="hidden" name="tags[]" value="5">
<input type="hidden" name="tags[]" value="6">
<button type="submit">次へ</button>
{{Form::close()}}
@endsection