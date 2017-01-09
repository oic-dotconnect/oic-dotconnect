@extends('event.event-detail-layout')

@section('hold')
@endsection

@section('subscription')
<a href="{{ route('sociallogin', [ 'redirect_url' => Request::url() ]) }}" class="login-btn">
  <i class="fa fa-google" aria-hidden="true"></i>
  <span>ログイン / 新規登録</span>
</a>
@endsection