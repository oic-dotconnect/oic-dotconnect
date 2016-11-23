@extends('layout.app')

@section('head')
	<link rel="stylesheet" href="{{{asset('/css/my-page.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
<h1>マイページ　参加イベント</h1>
@include('components/my-profile')
@include('components/my-tag-list', [ 'tags' => Auth::user()->tags ])

<div>
	@foreach ($events as $event)
		{{ $event->name }}
	@endforeach
</div>

{{ $events->links() }}

@endsection
