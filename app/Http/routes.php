<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// ランディングページ
Route::get('/',['as' => 'landing', function () {
	$data = [];
	$data["new_events"] = \App\Models\Event::orderby('open_date','desc')->take(5)->with('Tags')->get()->each(function($event){
			$event["entry_num"] = $event->entry_num();
	});
	$data["hold_events"] = \App\Models\Event::Beforehold()->take(5)->with('Tags')->orderby('openig_date')->get()->each(function($event){
			$event["entry_num"] = $event->entry_num();
	});
    return view('landing',$data);
}]);

Route::get('/view/{name}', function ($name) {
    return view($name);
});

// GoogleAuth
Route::get('auth/login/google', [
  'as' => 'sociallogin', 'uses' => 'Auth\SocialController@getGoogleAuth'
]);
Route::get('auth/login/callback/google', 'Auth\SocialController@getGoogleAuthCallback');

// ログインしている場合のみアクセスできるグループ 有効にする場合①と②の下のコメントアウトを外す
// ①
// Route::group(['middleware' => 'auth'], function () {
    // イベント登録ページ
    Route::get('/event/entry',['as' =>'event-entry',function(){
        return view('event/event-entry');
    }]);

    // イベント編集ページ
    Route::get('/event/edit',['as' =>'event-edit',function(Request $request){
        $data['event_code'] = $request->input("event_code");
        return view('event/event-edit',$data);
    }]);

    // イベント管理ページ
    Route::get('/event/control',['as' =>'event-control',function(){
        return view('event/event-control');
    }]);

    // お気に入りタグ編集ページ
    Route::get('/user/setting/tag',['as' =>'user-setting-tag',function(){
        return view('user/user-setting-tag');
    }]);

    // プロフィール編集ページ
    Route::get('/user/setting/profile',['as' =>'user-setting-profile',function(){
        return view('user/user-setting-profile');
    }]);

    // 通知設定ページ
    Route::get('/user/setting/notice',['as' =>'user-setting-notice',function(){
        return view('user/user-setting-notice');
    }]);

    //　退会ページ
    Route::get('/user/setting/leave',['as' =>'user-setting-leave',function(){
        return view('user/user-setting-leave');
    }]);

    // マイページ
    Route::get('/user/mypage',['as' =>'user-mypage',function(){
        return view('user/user-mypage');
    }]);
// ②
// });

// イベント検索ページ
Route::get('/event/search',['as' =>'event-search',function(){
    return view('event/event-search');
}]);

// イベント詳細ページ
Route::get('/event/detail',['as' =>'event-detail',function(Request $request){
    $data['event_code'] = $request->input("event_code");
    return view('event/event-detail',$data);
}]);

// プロフィール登録ページ
Route::get('/user/entry/profile',['as' =>'user-entry-profile',function(){
    return view('user/user-entry-profile');
}]);

// お気に入りタグ登録ページ
Route::get('/user/entry/tag',['as' =>'user-entry-tag',function(){
    return view('user/user-entry-tag');
}]);

// ユーザー登録確認ページ
Route::get('/user/entry/confirm',['as' =>'user-entry-confirm',function(){
    return view('user/user-entry-confirm');
}]);

// ユーザーページ
Route::get('/user',['as' =>'user',function(Request $request){
    $data['user_code'] = $request->input("user_code");
    return view('user/user',$data);
}]);

// ログインエラーページ(OICドメインではない場合)
Route::get('/err/login_domain',['as' => 'login_domain',function(){
    return view('errors/err-login-domain');
}]);

// アクセスエラーページ(ログイン必須のURLにアクセスしようとした場合)
Route::get('/err/access_noauth',['as' => 'access_noauth',function(){
    return view('errors/err-access-noauth');
}]);

// イベント公開エラーページ(イベント公開時にイベント公開に必要な情報が入力されていなかった場合)
Route::get('/err/event_open',['as' => 'event_open',function(){
    return view('errors/err-event-open');
}]);

