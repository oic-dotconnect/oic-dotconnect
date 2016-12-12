@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-common.css')}}}" media="screen" title="no title" charset="utf-8">
 	<link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-tag.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
@include('components.user-entry-step', [ 'current' => 'favtag' ])
{{ Form::open([ 
    'route' => 'post-user-entry-tag',
    'class' => 'register-form'
  ])}}
	<tag-select></tag-select>
	<div class="info">
		{{--<a href="{{ route('user-entry-cancel') }}" class="button">キャンセル</a></a>--}}
		<a href="#" class="button cancell">キャンセル</a></a>
		<button type="submit" name="submit" value="toConfirm" class="conf">入力確認へ</button>
	</div>
{{ Form::close() }}
@endsection