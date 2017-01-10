@extends('layout.app')

@section('head')
  <link rel="stylesheet" href="{{{asset('/css/my-page.css')}}}" media="screen" title="no title" charset="utf-8">
  
  <link href="./css/access-error.css" rel="stylesheet">
@endsection

@section('content')
<div class="wrapper">
  <div class="top">
    <h1>@yield("err-title")</h1>
  </div>
  <div class="primary">
      <div class="inner">
          <div class="acount-config">
              <div class="withdrawal">
                  <h2>@yield("err-title")</h2>
              </div>
              <div class="wording">
                @yield("err-wording")
              </div>
              @yield("err-btn")
          </div>
          <!-- acoutn-config -->
      </div>
      <!-- inner -->
  </div>
  <!-- parimary -->
</div>

@endsection
