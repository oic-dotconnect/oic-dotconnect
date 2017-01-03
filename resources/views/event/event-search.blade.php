@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('css/event_search.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
	<div class="wrapper">
		<h1 style="margin-bottom: 20px;">イベント検索</h1>
		<search-form></search-form>
	</div>
@endsection