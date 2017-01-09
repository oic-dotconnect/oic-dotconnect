@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('css/event-search.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
	<div class="wrapper">
		<h1 style="margin-bottom: 20px;">イベント検索</h1>
		<search-form title="{{ $title }}" tag="{{ $tag }}"></search-form>
	</div>
@endsection