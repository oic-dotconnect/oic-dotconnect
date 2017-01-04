@extends('layout.app')

@section('head')
  <link rel="stylesheet" href="{{{asset('css/user-setting/user-setting-common.css')}}}" media="screen" title="no title" charset="utf-8">  
@endsection

@section('content')
    <div class="wrapper">
        <h1 class="user-setting-title">ユーザー設定</h1>        
        @include('components/user-setting-menu', [ 'current' => 'tag' ])      
        {{ Form::open([ 
			'route' => 'post-user-setting-tag',
			'class' => 'register-form'
		])}}          
            <h2 class="user-setting-sub-title">お気に入りタグ設定</h2>
            <tag-select></tag-select>
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
        {{ Form::close() }}
@endsection