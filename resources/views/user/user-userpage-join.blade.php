@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('/css/my-page.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
<h1>マイページ 開催イベント</h1>
@include('components/user-profile', [ 'user' => $user ])
@include('components/user-tag-list', [ 'tags' => Auth::user()->tags ])
@endsection