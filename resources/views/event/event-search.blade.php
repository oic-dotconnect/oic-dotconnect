@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('css/event_search.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
	<search-form></search-form>
@endsection