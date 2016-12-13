@extends('layout.app')

@section('content')
	{!! Form::open(['route' => 'posttest']) !!}
		<search-form></search-from>
		{!! Form::submit('Submit') !!}
	{!! Form::close() !!}
@endsection
