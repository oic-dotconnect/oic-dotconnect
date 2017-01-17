@extends('layout.app')

@section('head')
     <link rel="stylesheet" href="{{{asset('css/event-entry.css')}}}" media="screen" title="no title" charset="utf-8">
     <link rel="stylesheet" href="{{{asset('css/event-edit.css')}}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
<div class="wrapper">    
    <h1 class="title">イベント登録</h1>
    <div class="entry-form">
    {{Form::open(['route' => ['post-event-edit', $event->code ] ])}}
        <div class="row">
            <div class="col top-left">
                <div class="entry-event-name box">
                    <h2 class="form-header box-title red">イベント名</h2>
                    <input class="entry-input" type="text" name="name" value="{{ $event->name }}">
                </div>
                <!-- entry-form -->
                <div class="tag-field box">
                    <h2 class="box-title green">タグ</h2>                    
                    <tag-choice value="{{ implode(',', $event->tags->map(function($tag){ return $tag->name; })->toArray()) }}"></tag-choice>
                </div>
                <div class="entry-field box">
                    <h2 class="form-header box-title yellow">分野</h2>
                    <div>
                        <input type="radio" name="field" id="field-it" value="it" {{ $event->field === 'it'? 'checked' : '' }}><label for="field-it">IT</label>
                        <input type="radio" name="field" id="field-game" value="game" {{ $event->field === 'game'? 'checked' : '' }}><label for="field-game">ゲーム</label>
                        <input type="radio" name="field" id="field-design" value="design" {{ $event->field === 'design'? 'checked' : '' }}><label for="field-design">デザイン</label>
                        <input type="radio" name="field" id="field-movie" value="movie" {{ $event->field === 'movie'? 'checked' : '' }}><label for="field-movie">映像</label>
                        <input type="radio" name="field" id="field-other" value="other" {{ $event->field === 'other'? 'checked' : '' }}><label for="field-other">その他</label>
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
                            <input class="entry-input-date" type="date" name="opening_date" value={{ $event->opening_date }}>
                        </div>
                    </div>
                    <!-- entry-item-date -->
                    <div class="entry-opendate-time">                        
                        <div class="entry-opendate-starttime">
                            <h3 class="form-header">開始時間</h3>
                            <input class="entry-input-date" type="time" name="start_at" value={{ $event->start_at }}>
                        </div>
                        <div class="entry-opendate-endtime">
                            <h3 class="form-header">終了時間</h3>
                            <input class="entry-input-date" type="time" name="end_at" value={{ $event->end_at }}>
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
                                <input class="start-date" type="date" name="recruit_start_date" value={{ $event->recruit_start_date }}>
                            </div>
                            <!-- entry-start-date -->
                            <div class="entry-recruitmen-start-time">
                                <h3 class="form-header">開始時間</h3>
                                <input class="start-time" type="time" name="recruit_start_time" value={{ $event->recruit_start_time }}>
                            </div>
                            <!-- entry-start-time -->
                        </div>
                        <!-- entry-start-group -->
                        <div class="entry-recruitmen-end-group entry-recruitmen-group">
                            <div class="entry-recruitmen-end-date">
                                <h3 class="form-header">終了日</h3>
                                <input class="end-date" type="date" name="recruit_end_date" value={{ $event->recruit_end_date }}>
                            </div>
                            <!-- entry-start-date -->
                            <div class="entry-recruitmen-end-time">
                                <h3 class="form-header">終了時間</h3>
                                <input class="end-time" type="time" name="recruit_end_time" value={{ $event->recruit_end_time }}>
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
            <room-choice floor-num={{ str_split($event->place)[0] }} room-name={{ $event->place }}></room-choice>
        </div>
        <!-- entry-room -->
        <div class="entry-capcity box">
            <h2 class="form-header box-title cyan">定員</h2>
            <input class="entry-input entry-capcity-input" type="number" name="capacity" value={{ $event->capacity }}>
            <span>人</span>
        </div>
        <!-- entry-capcity -->
        <div class="entry-description box">
            <h2 class="form-header box-title pink">説明</h2>
            <div class="entry-description-group">               
            </div>
            <!-- entry-description-group -->
            <textarea class="description-form" name="description" rows="10" cols="60">
            {{ $event->description }}
            </textarea>            
        </div>
        <!-- entry-description -->
    <div class="info">
        <div class="info-top">
            @if( $event->status === 'open') 
                <button type="submit" name="status" value="open" class="button save">変更する</button>
            @else                
                <button type="submit" name="status" value="close" class="button save">変更する</button>
            @endif
        </div>
        <div class="info-bottom">
            <div class="info-left">
                <a href="#mypage" class="button cancell">キャンセル</a>
            </div>
            <div class="info-right">
                @if( $event->status === 'open') 
                    <button type="submit" name="status" value="open" class="button open" disabled>変更して公開する</button>
                @else
                    <button type="submit" name="status" value="open" class="button open">変更して公開する</button>
                @endif
            </div>
        </div>
    </div>
    {{Form::close()}}
    </div>
    <!-- entry-from -->  
</div>
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