@extends('layout.app')

@section('head')
  <link rel="stylesheet" href="{{{asset('/css/error-pages.css')}}}" media="screen" title="no title" charset="utf-8">  
@endsection

@section('content')
<div class="wrapper">  
  <div class="box">
      <h2 class="box-title red">@yield("err-title")</h2>
      <div>
        <p>@yield("err-wording")</p>
        <div class="error-btns">
          @yield("err-btn")
        </div>
      </div>      
  </div>  
</div>

@endsection
