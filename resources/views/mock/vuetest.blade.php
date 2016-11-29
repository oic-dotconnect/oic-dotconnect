@extends('layout.app')

@section('content')
	{!! Form::open(['route' => 'posttest']) !!}
		<tag-select></tag-select>
		{!! Form::submit('Submit') !!}
	{!! Form::close() !!}
@endsection
