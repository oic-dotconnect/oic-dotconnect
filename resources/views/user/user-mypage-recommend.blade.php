@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('/css/my-page.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
<h1>マイページ　おすすめイベント</h1>
@include('components/my-profile')
@inclide('components/my-tag-list', [ 'user' => Auth::user()])
@endsection
