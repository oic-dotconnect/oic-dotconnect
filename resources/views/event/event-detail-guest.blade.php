@extends('event.event-detail-layout')

@section('hold')
@endsection

@section('subscription')
@include('components.event-detail-button', [ 'current' => 'guest' ])
@endsection