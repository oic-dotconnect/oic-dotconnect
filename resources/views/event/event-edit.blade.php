@extends('layout.app')

@section('head')

@endsection

@section('content')
<div class="wrapper">
    <div class="top">
        <h1>イベント編集</h1>
    </div>
    <!-- div.top -->
    <div class="primary">
        <div class="inner">
            <div class="entry-form">
            {{Form::open(['route' => 'post-event-entry'])}}
                <div class="entry-event-name">
                    <h2 class="form-header">イベント名</h2>
                    <input class="entry-input" type="text" value={{ $event->name }}>
                </div>
                <!-- entry-form -->
                <div class="entry-field">
                    <h2 class="form-header">分野</h2>
                    {{ Form::select('entry-item', [
                        'no' => '選択してください',
                        'it' => 'IT',
                        'design' => 'デザイン',
                        'game' => 'ゲーム',
                        'move' => '映像',
                        'other' => 'その他'],$event->field
                    ) }}
                    <!-- input-entry-field entry-item -->
                </div>
                <!-- entry-field -->
                <div class="entry-tag">
                    <h2 class="form-header">タグ</h2>
                    <input class="entry-input" type="text">
                </div>
                <!-- entry-tag -->
                <div class="entry-date">
                    <div class="entry-item-date">
                        <div class="entry-date-group">
                            <h2 class="form-header">開催日</h2>
                            <input class="entry-input-date" type="text" value={{ $event->opening_date }}>
                        </div>
                    </div>
                    <!-- entry-item-date -->
                    <div class="entry-item-date">
                        <span></span>
                        <div class="entry-date-group">
                            <h2 class="form-header">開始時間</h2>
                            <input class="entry-input-date" type="text" value={{ $event->start_at }}>
                        </div>
                        <!-- entry-date-group -->
                    </div>
                    <!-- entry-item-date -->
                    <div class="entry-item-date">
                        <span></span>
                        <div class="entry-date-group">
                            <h2 class="form-header">終了時間</h2>
                            <input class="entry-input-date" type="text" value={{ $event->end_at }}>
                        </div>
                        <!-- entry-date-group -->
                    </div>
                    <!-- entry-item-date -->
                </div>
                <!-- entry-date -->
                <div class="entry-room">
                    <h2 class="form-header">開催教室</h2>
                    <select class="entry-item">
                        <option value="">選択してください</option>
                        <option value="3A">3A</option>
                    </select>
                    <!-- input-entry-field entry-item -->
                </div>
                <!-- entry-room -->
                <div class="entry-recruitment">
                    <h2 class="form-header">募集期間</h2>
                    <div class="entry-recruitment-group">
                        <div class="entry-start-group">
                            <div class="entry-start-date">
                                <h2 class="form-header">開始日</h2>
                                <input class="start-date" type="text" value={{ $event->recruit_start_date }}>
                            </div>
                            <!-- entry-start-date -->
                            <div class="entry-start-time">
                                <h2 class="form-header">開始時間</h2>
                                <input class="start-time" type="text" value={{ $event->recruit_start_time }}>
                            </div>
                            <!-- entry-start-time -->
                        </div>
                        <!-- entry-start-group -->
                        <div class="entry-end-group">
                            <div class="entry-end-date">
                                <h2 class="form-header">終了日</h2>
                                <input class="end-date" type="text" value={{ $event->recruit_end_date }}>
                            </div>
                            <!-- entry-start-date -->
                            <div class="entry-end-time">
                                <h2 class="form-header">終了時間</h2>
                                <input class="end-time" type="text" value={{ $event->recruit_end_time }}>
                            </div>
                            <!-- entry-start-time -->
                        </div>
                        <!-- entry-start-group -->
                    </div>
                    <!-- entry-recruitment-group -->
                </div>
                <!-- entry-recruitment -->
                <div class="entry-capcity">
                    <h2 class="form-header">定員</h2>
                    <input class="entry-input entry-capcity-input" type="text" value={{ $event->capacity }}>
                    <span>人</span>
                </div>
                <!-- entry-capcity -->
                <div class="entry-description">
                    <h2 class="form-header">説明</h2>
                    <div class="entry-description-group">
                        <div class="entry-description-radio">
                            <input type="radio" name="editer" value="">
                            <p>リッチテキストエディタ</p>
                        </div>
                        <!-- entry-description-radio -->
                        <div class="entry-description-radio">
                            <input type="radio" name="editer" value="">
                            <p>Markdown</p>
                        </div>
                        <!-- entry-description-radio -->
                    </div>
                    <!-- entry-description-group -->
                    <div class="entry-description-aria">
                        <input type="textaria" value={{ $event->description }}>
                    </div>
                </div>
                <!-- entry-description -->
            <button type="submit" name="status" value="close">下書きを保存する</button>
            <a href="#mypage">キャンセル</a>
            <button type="submit" name="status" value="open">公開</button>
            {{Form::close()}}
            </div>
            <!-- entry-from -->
        </div>
        <!-- inner -->
    </div>
    <!-- primary -->
</div>{{ $event }}
<!-- primary -->
@endsection