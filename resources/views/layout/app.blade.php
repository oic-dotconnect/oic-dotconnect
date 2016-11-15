<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{{asset('/assets/css/common.css')}}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{{asset('/assets/css/color.css')}}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{{asset('/assets/css/header.css')}}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{{asset('/assets/css/footer.css')}}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{{asset('/css/normalize.css')}}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{{asset('/css/common.css')}}}" media="screen" title="no title" charset="utf-8">
    @yield('head')
  </head>
  <body>
    <tag-checkbox-list></tag-checkbox-list>
    <header id="header">
      <div id="header-left">
        <span id="logo">.Linker</span>
      </div>
      <div id="header-center">
        <div class="form-inline" id="header-search">
          <div class="input">
            <input type="text" name="name" value="">
          </div>
          <button type="submit" class="button orange">検索</button>
        </div>
        <a href="#"><i class="fa fa-tags" aria-hidden="true" id="tag-icon"></i></a>
      </div>
      <div id="header-right">
        <!-- <a href="#" id="acount">
          <div class="icon">
            <img src="http://placehold.it/32x32">
          </div>
          <span class="name">山崎好洋</span>
        </a> -->
        <a href="#" id="login">
          <i class="fa fa-google" aria-hidden="true"></i>
          <span>Login</span>
        </a>
      </div>
    </header>
    <main>
      @yield('content')
    </main>
    <footer id="footer"></footer>
    <script src="/js/bundle.js" charset="utf-8"></script>
  </body>
</html>
