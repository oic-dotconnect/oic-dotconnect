@extends('layout.app')

@section('content')
	{!! Form::open(['route' => 'posttest']) !!}
		<event-entry-tag></event-entry-tag>
		{!! Form::submit('Submit') !!}
	{!! Form::close() !!}
@endsection
