@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-common.css')}}}" media="screen" title="no title" charset="utf-8">
 	<link rel="stylesheet" href="{{{asset('css/user-entry/user-entry-tag.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
	<div class="wrapper">
		@include('components.user-entry-step', [ 'current' => 'favtag' ])
		{{ Form::open([ 
			'route' => 'post-user-entry-tag',
			'class' => 'register-form'
		])}}
		<h1 class="user-entry-title">お気に入りタグ登録</h1>
			<tag-select></tag-select>
			<div class="row info">	
				<div class="info-left">
					<a href="{{ route('user-entry-cancel') }}" class="button cancell left">キャンセル</a>
				</div>
				<div class="info-right">
					<button type="submit" name="submit" value="toConfirm" class="conf button right">入力確認へ</button>
				</div>			
			</div>
		{{ Form::close() }}
	</div>
@endsection