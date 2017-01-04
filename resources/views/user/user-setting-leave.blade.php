@extends('layout.app')

@section('head')
  <link rel="stylesheet" href="{{{asset('css/user-setting/user-setting-common.css')}}}" media="screen" title="no title" charset="utf-8">  
@endsection

@section('content')
<h1 class="user-setting-title">ユーザー設定</h1>
@include('components/user-setting-menu', [ 'current' => 'leave' ])
@endsection

