@extends('layout.app')

@section('content')
	<ul>
		@foreach($users as $user)
			<li><a href="{{ '/mock/auth/' . $user->code }}">{{ $user->name }}</a></li>
		@endforeach
	</ul>
@endsection