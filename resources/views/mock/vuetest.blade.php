@extends('layout.app')

@section('content')
	{!! Form::open(['route' => 'posttest']) !!}
		<tag-checkbox-list></tag-checkbox-list>
		{!! Form::submit('Submit') !!}
	{!! Form::close() !!}
@endsection
