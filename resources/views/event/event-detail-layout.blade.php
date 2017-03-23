@extends('layout.app')

@inject('eventservice','App\Services\EventService')

@section('head')    
@endsection

@section('content')
    <div class="event-detail">      
        @yield('hold')
        <div class="event-detail__top panel panel-default">
            <div class="event-detail__message">
                @if($event->status === 'stop')
                    <div class="stop-message message">このイベントは中止されました。</div>
                @elseif($eventservice->conditionClass($event) === 'finished')
                    <div class="finishe-message message">このイベントは終了しました。</div>
                @endif
            </div>
            <div class="event-detail__field event-detail__field--{{ $event->field }}">
                {{ $eventservice->field($event->field) }}
            </div>
            <div class="event-detail__title">
                {{ $event->name }}
            </div>
            <div class="event-detail__tags">
                @foreach ($tags as $tag)
                    @include('components.tag', [ 'tag' => $tag ])
                @endforeach   
            </div>
            <div class="event-detail__organizer">
                <div class="detail-label">
                    <div class="detail-label__icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="detail-label__text">
                        主催者
                    </div>
                </div>
                <a href="{{ route('user-page-join', [ 'user_code' => $event->organizer->code ]) }}" class="organizer user detail-body">
                    <img class="user__icon user__icon--48" src="{{ $event->organizer->iconMinUrl }}">                
                    <div class="user__name">
                        {{ $event->organizer->name }}
                    </div>
                </a>                            
            </div>
            <div class="event-detail__opening-date">
                <div class="detail-label">
                    <div class="detail-label__icon">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    </div>
                    <div class="detail-label__text">
                        開催日
                    </div>                
                </div>
                <div class="detail-body">
                    @if( isset($event->opening_date) )
                        {{ $eventservice->dateYear($event->opening_date) }}/{{ $eventservice->dateMonth($event->opening_date) }}/{{ $eventservice->dateDay($event->opening_date) }} {{ $eventservice->dateTime($event->start_at) }}~{{ $eventservice->datetime($event->end_at) }}
                    @else 
                        未設定
                    @endif
                </div>
            </div>
            <div class="event-detail__place">
                <div class="detail-label">
                    <div class="detail-label__icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="detail-label__text">
                        開催教室
                    </div>                
                </div>
                <div class="detail-body">
                    {{$event->place}}
                </div>
            </div>
            <div class="event-detail__recruit">
                <div class="detail-label">
                    <div class="detail-label__icon">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                    <div class="detail-label__text">
                        募集期間
                    </div>                
                </div>
                <div class="detail-body">
                    {{ $eventservice->dateYear($event->recruit_start_date) }}/{{ $eventservice->dateMonth($event->recruit_start_date) }}/{{ $eventservice->dateDay($event->recruit_start_date) }} {{ $eventservice->dateTime($event->recruit_start_time) }}
                    ~
                    {{ $eventservice->dateYear($event->recruit_end_date) }}/{{ $eventservice->dateMonth($event->recruit_end_date) }}/{{ $eventservice->dateDay($event->recruit_end_date) }} {{ $eventservice->dateTime($event->recruit_end_time) }}                
                </div>
            </div>
            <div class="event-detail__joiner">
                <div class="detail-label">
                    <div class="detail-label__icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="detail-label__text">
                        参加者数
                    </div>                
                </div>
                <div class="detail-body">
                    @if( isset($event->capacity) )
                        {{ $event->entry_num() }}/{{ $event->capacity }}人
                    @else 
                        未設定
                    @endif
                </div>
            </div>
            <div class="event-detail__action">              
                @yield('subscription')
            </div>
        </div>
        <div class="event-detail__description panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">イベント説明</h3>
            </div>
            <div class="panel-body">
                @if( isset($event->description) )
                    {!! $event->description !!}
                @endif
            </div>            
        </div>
        <div class="event-detail__participants">
            <div class="joiner-list panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">参加者 <span class="badge">{{ count($users) }}</span></h3>
                </div>
                <div class="panel-body">
                    @foreach($users as $user)
                        <a href="{{ route('user-page-join', [ 'user_code' => $user->code ]) }}" class="user detail-body">
                            <img class="user__icon user__icon--48" src="{{ $user->iconMinUrl }}">                
                            <div class="user__name">
                                {{ $user->name }}
                            </div>
                        </a>
                    @endforeach
                </div>            
            </div>
            <div class="joiner-list panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">補欠者 <span class="badge">{{ count($substitate) }}</span></h3>
                </div>
                <div class="panel-body">
                    @foreach($substitate as $user)
                        <a href="{{ route('user-page-join', [ 'user_code' => $user->code ]) }}" class="user detail-body">
                            <img class="user__icon user__icon--48" src="{{ $user->iconMinUrl }}">                
                            <div class="user__name">
                                {{ $user->name }}
                            </div>
                        </a>
                    @endforeach
                </div>            
            </div>
        </div>
    </div>
</div>
@endsection