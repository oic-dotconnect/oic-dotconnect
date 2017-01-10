@extends('user.user-userpage-layout')

@section('event-tab')
  @include('components/user-event-tab',['current' => 'hold','user_code' => $user->code])
@endsection