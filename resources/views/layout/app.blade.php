<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="{{{asset('/assets/css/common.css')}}}" media="screen" title="no title" charset="utf-8">-->
    <link rel="stylesheet" href="{{{asset('/css/common.css')}}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{{asset('/css/color.css')}}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{{asset('/css/header.css')}}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{{asset('/css/event.css')}}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{{asset('/assets/css/footer.css')}}}" media="screen" title="no title" charset="utf-8">
    <script src="http://cdn.ckeditor.com/4.5.6/full-all/ckeditor.js"></script>
    @yield('head')
  </head>
  <body>
    @include('components.header')
    <main>
      <div class = "wrapper">
        @yield('content')
      </div>
    </main>
    <footer id="footer"></footer>
    <script src="/js/bundle.js" charset="utf-8"></script>
  </body>
</html>
