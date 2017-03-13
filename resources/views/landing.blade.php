@extends('layout.app')

@section('content')
<div class="eyecatch">
    <img src="{{{asset('/assets/img/top-img.jpg')}}}" class="eyecatch-background" alt="" />
    <div class="eyecatch-content">
        <img src="{{{asset('/assets/img/logo.png')}}}" class="eyecatch-content__logo" alt="" />
        <p class="eyecatch-content__text" >人と人を繋ぎ、輪を広げていく</p>
        {{ Form::open(['route' => 'event-search', 'method' => 'GET', 'class' => 'eyecatch-content__search_form'])}}          
            <input type="text" class="eyecatch-content__search_form--input" name="title" value="" placeholder="Web">
            <button type="submit" class="eyecatch-content__search_form--btn">検索</button>        
        {{ Form::close() }}
        <!-- eyecatch-content__search_form -->
    </div>
    <!-- /eyecatch-cotent -->
</div>
<!-- /eyecatch -->
<section class="about">
    <h2 class="about-heading">.Linkerとは？</h2>
    <ul class="about-list">
      <li class="about-list__item">
        <h3 class="about-list__item--title"><i class="fa fa-shield" aria-hidden="true"></i>初めての方へ</h2>
        <div class="about-list__item--text">
          このサービスは学内のイベントを管理するためのサービスです。
          イベントを開催、参加することで他コースの学生や先輩、後輩との繋がれる環境を提供します。
        </div>
      </li>
      <section>
        <h2><i class="fa fa-users" aria-hidden="true"></i>三人寄れば文殊の知恵</h2>
        <p>
          ことわざにもあるように、1人では難しいことも、みんなでやれば出来ます。
          一緒に勉強したり、切磋琢磨し技術を磨く"仲間""を見つけましょう。
        </p>
      </section>
      <section>
        <h2><i class="fa fa-question-circle" aria-hidden="true"></i>どういった時に使うのか</h2>
        <ul>
          <li>勉強したことをアウトプットしたい時</li>
          <li>一緒に自習する仲間を探したい時</li>
          <li>遊戯王の大会を開催したい時</li>
          <li>モンストのチームを募集したい時</li>
        </ul>
      </section>
      <section>
        <h2><i class="fa fa-tags" aria-hidden="true"></i>自分に合ったイベント</h2>
        <p>
          .Linkerでは自分に合ったイベントをすぐに見つけるための機能があります。
          イベントやプロフィールに好きなタグを設定することで、自分に合ったイベントを探すことが出来ます。
        </p>
      </section>
      <section>
        <h2><i class="fa fa-search" aria-hidden="true"></i>空いてる教室を検索</h2>
        <p>
          授業の時間割や登録されているイベントを考慮し、空いている教室を検索することが出来るため、教室の確保が簡単に！
        </p>
      </section>
    </ul>
</section>
<div class="event-section">
    <section>
        <h1 class="heading">新着イベント</h1>
        <div class="event-list">
            @foreach( $new_events as $event)
                @include('components.event',['event' => $event])
            @endforeach
        </div>
    </section>
    <section>
        <h1 class="heading">開催予定イベント</h1>
        <div class="event-list">
            @foreach( $hold_events as $event)
                @include('components.event',['event' => $event])
            @endforeach
        </div>
    </section>
</div>
@endsection
