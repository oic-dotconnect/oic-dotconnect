@extends('layout.app')

@section('head')

@endsection

@section('content')
<div class="wrapper">
    <div class="top">
        <h1>イベント登録</h1>
    </div>
    <!-- div.top -->
    <div class="primary">
        <div class="inner">
            <div class="entry-form">
            {{Form::open(['route' => 'post-event-entry'])}}
                <div class="entry-event-name">
                    <h2 class="form-header">イベント名</h2>
                    <input class="entry-input" type="text" name="name">
                </div>
                <!-- entry-form -->
                <div class="entry-field">
                    <h2 class="form-header">分野</h2>
                    <select class="entry-item">
                        <option value="">選択してください</option>
                        <option value="IT">IT</option>
                        <option value="デザイン">デザイン</option>
                        <option value="ゲーム">ゲーム</option>
                        <option value="その他">その他</option>
                    </select>
                    <!-- input-entry-field entry-item -->
                </div>
                <!-- entry-field -->
                <tag-choice></tag-choice>
                <!-- entry-tag -->
                <div class="entry-date">
                    <div class="entry-item-date">
                        <div class="entry-date-group">
                            <h2 class="form-header">開催日</h2>
                            <input class="entry-input-date" type="date" name="opening_date">
                        </div>
                    </div>
                    <!-- entry-item-date -->
                    <div class="entry-item-date">
                        <span></span>
                        <div class="entry-date-group">
                            <h2 class="form-header">開始時間</h2>
                            <input class="entry-input-date" type="time" name="start_at">
                        </div>
                        <!-- entry-date-group -->
                    </div>
                    <!-- entry-item-date -->
                    <div class="entry-item-date">
                        <span></span>
                        <div class="entry-date-group">
                            <h2 class="form-header">終了時間</h2>
                            <input class="entry-input-date" type="time" name="end_at">
                        </div>
                        <!-- entry-date-group -->
                    </div>
                    <!-- entry-item-date -->
                </div>
                <!-- entry-date -->
                <room-choice></room-choice>
                <!-- entry-room -->
                <div class="entry-recruitment">
                    <h2 class="form-header">募集期間</h2>
                    <div class="entry-recruitment-group">
                        <div class="entry-start-group">
                            <div class="entry-start-date">
                                <h2 class="form-header">開始日</h2>
                                <input class="start-date" type="date" name="recruit_start_date">
                            </div>
                            <!-- entry-start-date -->
                            <div class="entry-start-time">
                                <h2 class="form-header">開始時間</h2>
                                <input class="start-time" type="time" name="recruit_start_time">
                            </div>
                            <!-- entry-start-time -->
                        </div>
                        <!-- entry-start-group -->
                        <div class="entry-end-group">
                            <div class="entry-end-date">
                                <h2 class="form-header">終了日</h2>
                                <input class="end-date" type="date" name="recruit_end_date">
                            </div>
                            <!-- entry-start-date -->
                            <div class="entry-end-time">
                                <h2 class="form-header">終了時間</h2>
                                <input class="end-time" type="time" name="recruit_end_time">
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
                    <input class="entry-input entry-capcity-input" type="text" name="capacity">
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
                        <input type="textaria" name="description">
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
</div>
<!-- primary -->
@endsection
