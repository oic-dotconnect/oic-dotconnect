@extends('layout.app')

@section('head')
  <link rel="stylesheet" href="{{{asset('css/user-setting/user-setting-common.css')}}}" media="screen" title="no title" charset="utf-8">  
  <link rel="stylesheet" href="{{{asset('css/user-setting/user-setting-notice.css')}}}" media="screen" title="no title" charset="utf-8">  
@endsection

@section('content')
    <div class="wrapper">
        <h1 class="user-setting-title">ユーザー設定</h1>        
        @include('components/user-setting-menu', [ 'current' => 'notice' ])        
        <h2 class="user-setting-sub-title">メール通知設定</h2>
        {{ Form::open([
            'route' => 'post-user-setting-notice',            
        ])}}
            <div class="">
                    <div class="hold-event-notice box notice-box">
                        <h2 class="box-title red">開催イベント</h2>
                        <div class="notice-caption">
                            自分が開催しているイベントの参加者が増えた場合（参加）、減った場合（キャンセル）に通知します。
                        </div>
                        <div class="notice-form">
                            <div class="notice-check">
                                <input type="checkbox" id="notice-join" name="notice-join" {{ $user->event_join_notice? 'checked': '' }}><label for="notice-join">参加通知</label>
                            </div>
                            <div class="notice-check">
                                <input type="checkbox" id="notice-cancel" name="notice-cancel" {{ $user->event_cancel_notice? 'checked': '' }}><label for="notice-cancel">キャンセル通知</label>
                            </div>
                        </div>
                    </div>
                    <div class="regular-notice box notice-box">
                        <h2 class="box-title yellow">定期通知</h2>
                        <div class="notice-caption">
                            お気に入りのタグなどから、あなたにオススメのイベントを1週間に一度メールでお知らせします。
                        </div>
                        <div class="notice-form">
                            <div class="notice-check">
                                <input type="checkbox" id="notice-regular" name="notice-regular" {{ $user->regular_notice? 'checked': '' }}><label for="notice-regular">定期通知</label>
                            </div>
                        </div>
                    </div>
                    <div class="tag-notice box notice-box">
                        <h2 class="box-title green">タグ</h2>
                        <div class="notice-caption">
                            お気に入りにしているタグの付いたイベントが登録された場合に通知します。個別に設定することができます。
                        </div>
                        <div class="notice-form">                    
                            <div class="notice-tags">
                                @foreach($user->tags as $tag)                            
                                    <div class="tag"><input type="checkbox" id="{{ 'notice-tag-' . $tag->id }}" name="tag-notice[{{ $tag->id }}]" {{ $tag->pivot->noticed? 'checked': '' }}><label for="{{ 'notice-tag-' . $tag->id }}">{{ $tag->name }}</label><wbr></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>                
            <div class="row info">
                <div class="col">          
                    <div class="row">
                        <div class="info-left">
                            <a href="{{ route('user-mypage-recommend') }}" class="button cancell left">キャンセル</a>
                        </div>
                        <div class="info-right">                
                            <button type="submit" class="change button right">変更</button>
                        </div>
                    </div>
                </div>
                </div>
            </div> 
        {{ Form::close() }}  
    </div>
@endsection

