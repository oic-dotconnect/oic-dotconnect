@extends('user.user-mypage-layout')

@section('event-tab')
  @include('components/my-event-tab',['current' => 'join'])
@endsection