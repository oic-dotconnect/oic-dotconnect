@extends('layout.app')

@inject('eventservice','App\Services\EventService')

@section('head')
    <link rel="stylesheet" href="{{{asset('css/event-detail.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
    <div class="wrapper">
      <div class="event-box">
        <div class="box">
          <div class="inner">
            <div class="heading">
              <div class="filed-box">
                  <div class="field {{ $event->field }}">
                      <p>{{ $eventservice->field($event->field) }}</p>
                  </div>
                <!-- div.field -->
              </div>
                  <div class="event-detail-header">
                    <div class="title">
                        <p>{{ $event->name }}</p>
                    </div>
                    <!-- div.title -->
                    <div class="tags">
                        @foreach ($tags as $tag)
                            @include('components.tag', [ 'tag' => $tag ])
                        @endforeach                      
                    </div>
                    <!-- div.tags -->
                  </div>
            </div>
            <!-- div.heading -->
            <table class="event-detail-table table">
              <tr>
                <th>
                <div class="th-box">
                  <div class="icon-box">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </div>
                  <p>主催者：</p>
                </div>
                </th>
                <td class="td-box user">
                  <div class="icon"><img src="{{ $event->organizer->iconMinUrl }}"></div>
                  <p>{{ $event->organizer->name }}</p>
                </td>
              </tr>
              <tr>
                <th>
                <div class="th-box">
                  <div class="icon-box">
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                  </div>
                  <p>開催日：</p>
                </div>
                </th>
                <td><p>{{ $eventservice->dateYear($event->opening_date) }}/{{ $eventservice->dateMonth($event->opening_date) }}/{{ $eventservice->dateDay($event->opening_date) }} {{ $eventservice->dateTime($event->start_at) }}~{{ $eventservice->datetime($event->end_at) }}</p></td>
              </tr>
              <tr>
                <th>
                <div class="th-box">
                  <div class="icon-box">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                  </div>
                  <p>開催教室：</p>
                </div>
                </th>
                <td>{{$event->place}}</td>
              </tr>
              <tr>
                <th>
                <div class="th-box">
                  <div class="icon-box">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                  <p>募集期間：</p>
                </div>
                </th>
                <td>
                  <div class="td-box event-start">
                    <p>募集開始：{{ $eventservice->dateYear($event->recruit_start_date) }}/{{ $eventservice->dateMonth($event->recruit_start_date) }}/{{ $eventservice->dateDay($event->recruit_start_date) }} {{ $eventservice->dateTime($event->recruit_start_time) }}</p>                    
                  </div>                
                  <div class="td-box event-end">
                      <p>募集終了：{{ $eventservice->dateYear($event->recruit_end_date) }}/{{ $eventservice->dateMonth($event->recruit_end_date) }}/{{ $eventservice->dateDay($event->recruit_end_date) }} {{ $eventservice->dateTime($event->recruit_end_time) }}</p>     
                  </div>
                </td>
              </tr>
              <tr>
                <th>
                <div class="th-box">
                    <div class="icon-box">
                      <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <p>定員：</p>
                </div>
                </th>
                <td>
                  <div class="td-box">                    
                    <p>{{ $event->entry_num() }}</p>
                    <p>/</p>                    
                    <p>{{ $event->capacity }}</p>
                    <p>人</p>
                  </div>
                </td>
              </tr>
            </table>
            <div class="event-entry">
              @yield('subscription')
            </div>
          </div>
        </div>
        <div class="secondary">
          <div  class="box description-box">
            <h2 class="box-title red">イベント説明</h2>
            <div class="description">
                {!! $event->description !!}
            </div>
          </div>
          <!-- div.description -->
          <div class="user-group">
            <div class="participant box">              
            <h3 class="box-title green">参加者一覧 <span class="amount">{{ count($users) }}人</span></h3>                              
              <!-- div.participant -->
              <div class="participant-list">
                @foreach($users as $user)                    
                    <div class="user">
                        <div class="icon"><img src="{{ $user->icon_min_url }}"></div>
                        <div>{{ $user->name }}</div>
                    </div>
                @endforeach                
              </div>
              <!-- div.participant-list -->
            </div>
            <!-- div.participant -->
            <div class="substitate box">
              <h3 class="box-title green">補欠者一覧 <span class="amount">{{ count($substitate) }}人</span></h3>                              
              <!-- div.substitate-title -->
              <div class="substitate-list">
                 @foreach($substitate as $user)
                    <div class="user">
                        <div class="icon"><img src="{{ $user->iconMinUrl }}"></div>
                        <div>{{ $user->name }}</div>
                    </div>
                @endforeach     
              </div>
              <!-- div.substitate-list -->              
            </div>
            <!-- div.substitate -->
          </div>
          <!-- div.user-group -->
        </div>
        <!-- div.secondary -->
      </div>
      <!-- div.eventbox -->
    </div>
    <!-- div.wrapper -->
@endsection
