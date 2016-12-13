@extends('layout.app')

@section('content')
    <div class="top">
        <h1>イベント詳細</h1>
    </div>
    <!-- div.top -->
    <div class="primary">
        <div class="inner">
            <div class="heading">
                <div class="field">
                    <p>{{$event[0]->field}}</p>
                </div>
                <!-- div.field -->
                <div class="title">
                    <p>{{$event[0]->name}}</p>
                </div>
                <!-- div.title -->
            </div>
            <!-- div.heading -->
            <table class="detail-table table">
                <tr class="tag">
                    <th class="table_title">
                        <p>タグ</p>
                    </th>
                    <!-- th -->
                    <td class="table_summary">
                    @foreach ($tags as $tag)
                        <p>{{ $tag->name }}</p>
                    @endforeach
                    </td>
                    <!-- td -->
                </tr>
                <!-- tr.tag -->
                <tr class="organizer">
                    <th class="table_title">
                        <p>主催者</p>
                    </th>
                    <!-- th -->
                    <td class="table_summary">
                        <div class="person">
                            <p class="icon"></p>
                            <p>{{ $event[0]->organizer->name }}</p>
                        </div>
                    </td>
                    <!-- td -->
                </tr>
                <!-- tr.organizer -->
                <tr class="event-date">
                    <th class="table_title">
                        <p>開催日</p>
                    </th>
                    <!-- th -->
                    <td class="table_summary">
                      <p>{{$event[0]->opening_date}} - {{$event[0]->start_at}} - {{$event[0]->end_at}}</p>
                    </td>
                    <!-- td -->
                </tr>
                <!-- tr.event-date -->
                <tr class="place">
                    <th class="table_title">
                        <p>開催教室</p>
                    </th>
                    <td class="table_summary">
                        <p>{{$event[0]->place}}</p>
                    </td>
                </tr>
                <!-- tr.place -->
            </table>
            <!-- table.detail-table -->
            <table class="recruitment-table table">
                <tr class="recritment" rowspan="2">
                    <th class="table_title">
                        <div class="recritment-title">
                            <p>募集期間</p>
                        </div>
                        <!-- div.recritment-title -->
                        <div class="none">
                            <p>&nbsp;</p>
                        </div>
                        <!-- div -->
                    </th>
                    <!-- th -->
                    <td class="table_summary">
                        <div class="recritment-start">
                            <p>開始日</p>
                            <p>{{ $event[0]->recruit_start_date }}</p>
                            <p>-</p>
                            <p>{{ $event[0]->recruit_start_time }}</p>
                        </div>
                        <!-- div.recritment-end -->
                        <div class="recritment-end">
                            <p>終了日</p>
                            <p>{{ $event[0]->recruit_end_date }}</p>
                            <p>-</p>
                            <p>{{ $event[0]->recruit_end_time }}</p>
                        </div>
                        <!-- div.recritment-end -->
                    </td>
                    <!-- td -->
                </tr>
                <!-- tr.recritment -->
                <tr class="capacity">
                    <th class="table_title">
                        <p>定員</p>
                    </th>
                    <!-- th -->
                    <td class="table_summary">
                        <p>現在</p>
                        <p>/</p>
                        <p>最大</p>
                        <p>{{ $event[0]->capacity }}人</p>
                    </td>
                    <!-- td -->
                </tr>
                <!-- tr.capacity -->
            </table>
            <!-- table.recruitment-table -->
            <div class="subscription">
                <button type="button">申し込み</button>
            </div>
            <!-- div.subscription -->
        </div>
        <!-- div.detail -->
    </div>
    <!-- div.primary -->
    <div class="secondary">
        <div class="description">
            <div id="editor_area" class="group_inner clearfix">
              {{ $event[0]->description }}
            </div>
        </div>
        <!-- div.description -->
        <div class="person-group">
            <div class="participant">
                <div class="participant-title">
                    <p class="list-title">参加者一覧</p>
                    <p class="amount">人数</p>
                </div>
                <!-- div.participant -->
                <div class="participant-list">
                    <div class="person">
                        <p class="icon"></p>
                        <p>名前</p>
                    </div>
                    <!-- div.person -->

                </div>
                <!-- div.participant-list -->
                <div class="more">
                    <i class="fa fa-caret-down fa-2x fa-color" aria-hidden="true"></i>
                </div>
            </div>
            <!-- div.participant -->
            <div class="substitate">
                <div class="substitate-title">
                    <p class="list-title">補欠者一覧</p>
                    <p class="amount">人数</p>
                </div>
                <!-- div.substitate-title -->
                <div class="substitate-list">
                    <div class="person">
                        <p class="icon"></p>
                        <p>名前</p>
                    </div>
                    <!-- div.person -->
                </div>
                <!-- div.substitate-list -->
                <div class="more">
                    <i class="fa fa-caret-down fa-2x fa-color" aria-hidden="true"></i>
                </div>
            </div>
            <!-- div.substitate -->
        </div>
        <!-- div.person-group -->
    </div>
    <!-- div.secondary -->
@endsection
