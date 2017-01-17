@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{{asset('css/event-entry.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
<div class="wrapper">    
    <h1 class="title">イベント登録</h1>
    <div class="entry-form">
    {{Form::open(['route' => 'post-event-entry'])}}
        <div class="row">
            <div class="col top-left">
                <div class="entry-event-name box">
                    <h2 class="form-header box-title red">イベント名</h2>
                    <input class="entry-input" type="text" name="name">
                </div>
                <!-- entry-form -->
                <div class="tag-field box">
                    <h2 class="box-title green">タグ</h2>
                    <tag-choice></tag-choice>
                </div>
                <div class="entry-field box">
                    <h2 class="form-header box-title yellow">分野</h2>
                    <div>
                        <input type="radio" name="field" id="field-it" value="it"><label for="field-it">IT</label>
                        <input type="radio" name="field" id="field-game" value="game"><label for="field-game">ゲーム</label>
                        <input type="radio" name="field" id="field-design" value="design"><label for="field-design">デザイン</label>
                        <input type="radio" name="field" id="field-movie" value="movie"><label for="field-movie">映像</label>
                        <input type="radio" name="field" id="field-other" value="other" checked><label for="field-other">その他</label>
                    </div>           
                </div>
                <!-- entry-field -->
            </div>
            <div class="col top-right">
                <div class="entry-date box">
                    <h2 class="box-title blue">開催日時</h2>
                    <div class="entry-opendate-date">
                        <div class="entry-date-group">
                            <h3 class="form-header">開催日</h3>
                            <input class="entry-input-date" type="date" name="opening_date">
                        </div>
                    </div>
                    <!-- entry-item-date -->
                    <div class="entry-opendate-time">                        
                        <div class="entry-opendate-starttime">
                            <h3 class="form-header">開始時間</h3>
                            <input class="entry-input-date" type="time" name="start_at">
                        </div>
                        <div class="entry-opendate-endtime">
                            <h3 class="form-header">終了時間</h3>
                            <input class="entry-input-date" type="time" name="end_at">
                        </div>
                        <!-- entry-date-group -->
                    </div>
                    <!-- entry-item-date -->                    
                </div>
                <!-- entry-date -->        
                <div class="entry-recruitment box">
                    <h2 class="form-header box-title purple">募集期間</h2>
                    <div class="">
                        <div class="entry-recruitmen-start-group entry-recruitmen-group">
                            <div class="entry-recruitmen-start-date">
                                <h3 class="form-header">開始日</h3>
                                <input class="start-date" type="date" name="recruit_start_date">
                            </div>
                            <!-- entry-start-date -->
                            <div class="entry-recruitmen-start-time">
                                <h3 class="form-header">開始時間</h3>
                                <input class="start-time" type="time" name="recruit_start_time">
                            </div>
                            <!-- entry-start-time -->
                        </div>
                        <!-- entry-start-group -->
                        <div class="entry-recruitmen-end-group entry-recruitmen-group">
                            <div class="entry-recruitmen-end-date">
                                <h3 class="form-header">終了日</h3>
                                <input class="end-date" type="date" name="recruit_end_date">
                            </div>
                            <!-- entry-start-date -->
                            <div class="entry-recruitmen-end-time">
                                <h3 class="form-header">終了時間</h3>
                                <input class="end-time" type="time" name="recruit_end_time">
                            </div>
                            <!-- entry-start-time -->
                        </div>
                        <!-- entry-start-group -->
                    </div>
                    <!-- entry-recruitment-group -->
                </div>
                <!-- entry-recruitment -->
            </div>
        </div>
        <!-- entry-tag -->
        <div class="box">
            <h2 class="box-title orange">開催教室</h2>
            <room-choice></room-choice>
        </div>
        <!-- entry-room -->
        <div class="entry-capcity box">
            <h2 class="form-header box-title cyan">定員</h2>
            <input class="entry-input entry-capcity-input" type="number" min="1" name="capacity">
            <span>人</span>
        </div>
        <!-- entry-capcity -->
        <div class="entry-description box">
            <h2 class="form-header box-title pink">説明</h2>
            <div class="entry-description-group">               
            </div>
            <!-- entry-description-group -->            
            <textarea class="description-form" name="description" rows="10" cols="60"></textarea> 
        </div>
        <!-- entry-description -->
    <div class="info">
        <div class="info-top">
            <button type="submit" name="status" value="close" class="button save">下書きを保存する</button>
        </div>
        <div class="info-bottom">
            <div class="info-left">
                <a href="#mypage" class="button cancell">キャンセル</a>
            </div>
            <div class="info-right">
                <button type="submit" name="status" value="open" class="button open">公開</button>
            </div>
        </div>
    </div>
    {{Form::close()}}
    </div>
    <!-- entry-from -->  
</div>
@endsection
