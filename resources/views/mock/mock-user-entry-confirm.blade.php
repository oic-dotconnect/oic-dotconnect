@extends('layout.app')

@section('content')
<h1>MOCK ユーザー登録確認ページ</h1>
<h3>プロフィール</h3>
{{var_dump($profile)}}
<h3>タグ</h3>
{{var_dump($tags)}}
@endsection