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
Route::group(['middleware' => 'dev'], function () {
// ランディングページ
Route::get('/',['as' => 'landing', 'uses' => 'LandingController@index']);

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
Route::group(['middleware' => 'auth'], function () {
    // イベント登録ページ
    Route::get('/event/entry',['as' =>'event-entry','uses' => function(){
        return view('event/event-entry');
    }]);

    // イベント登録
    Route::post('/event/entry', ['as' => 'post-event-entry', 'uses' => 'EventController@entry']);

    // イベント編集ページ
    Route::get('/event/{event_code}/edit',['as' =>'event-edit','uses' => 'EventController@edit']);

    // イベント編集
    Route::post('/event/{event_code}/edit', ['as' => 'post-event-edit', 'uses' => 'EventController@postEdit']);
    
    // イベント管理ページ
    Route::get('/user/eventcontrol',['as' =>'user-event-control','uses' => 'UserController@eventControl']);

    // お気に入りタグ編集ページ
    Route::get('/user/setting/tag',['as' =>'user-setting-tag','uses' => 'UserController@editFavoriteTags']);

    // プロフィール編集ページ
    Route::get('/user/setting/profile',['as' =>'user-setting-profile','uses' => 'UserController@editProfile']);

    // 通知設定ページ
    Route::get('/user/setting/notice',['as' =>'user-setting-notice','uses' => 'UserController@editNotice']);

    //　退会ページ
    Route::get('/user/setting/leave',['as' =>'user-setting-leave','uses' => 'UserController@editLeave']);

    // マイページ おすすめイベント
    Route::get('/user/mypage/',['as' =>'user-mypage','uses' => 'UserController@mypageRecommend']);

    // マイページ おすすめイベント
    Route::get('/user/mypage/recommend',['as' =>'user-mypage-recommend','uses' => 'UserController@mypageRecommend']);

    // マイページ 参加イベント
    Route::get('/user/mypage/join',['as' =>'user-mypage-join','uses' => 'UserController@mypageJoin']);

    // マイページ 開催イベント
    Route::get('/user/mypage/hold',['as' =>'user-mypage-hold','uses' => 'UserController@mypageHold']);

    // ログアウト
    Route::get('/logout', ['as' => 'logout', 'uses' => 'UserController@logout']);

    //　退会
    Route::post('/user/leave', ['as' => 'user-leave', 'uses' => 'UserController@leave']);

    // イベント
    Route::post('/event/{event_code}/delete', ['as' => 'event-delete', 'uses' => 'EventController@delete']);
// ②
});

Route::group(['middleware' => 'guest'], function () {
    if (Auth::check()) {
        return Redirect::to('/');
    }else{
        // プロフィール登録ページ
        Route::get('/user/entry/profile',['as' =>'user-entry-profile','uses' => 'UserEntryController@ShowEditProfile']);

        // お気に入りタグ登録ページ
        Route::get('/user/entry/tag',['as' =>'user-entry-tag',function(){
            return view('user/user-entry-tag');
        }]);

        // ユーザー登録確認ページ
        Route::get('/user/entry/confirm',['as' =>'user-entry-confirm','uses' => 'UserEntryController@Confirm']);
    }
});

// イベント検索ページ
Route::get('/event/search',['as' =>'event-search','uses' => 'EventController@search']);

// イベント詳細ページ
Route::get('/event/{event_code}',['as' =>'event-detail','uses' => 'EventController@detail']);

//ユーザーページ
Route::get('/user/{user_code}', ['as' =>'user-page', 'uses' => 'UserController@userpageJoin']);

// ユーザーページ　参加イベント
Route::get('/user/{user_code}/join',['as' =>'user-page-join', 'uses' => 'UserController@userpageJoin']);

// ユーザーページ　開催イベント
Route::get('/user/{user_code}/hold',['as' =>'user-page-hold', 'uses' => 'UserController@userpageHold']);

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

//-------------------------ユーザー登録-----------------------------------

// ユーザー登録（コントローラーへ）
Route::post('/user/entry/profile',['as' => 'post-user-entry-profile','uses' =>'UserEntryController@InputProfile']);

//ユーザーお気に入りタグ登録（コントローラーへ）
Route::post('/user/entry/tag',['as' =>'post-user-entry-tag','uses' =>'UserEntryController@InputTag']);

//ユーザー登録コントローラーへ
Route::post('/user/create',['as' =>'post-user-create','uses' =>'UserEntryController@Create']);

//ユーザー登録キャンセル
Route::get('user/entry/cancel',['as' => 'user-entry-cancel','uses' => 'UserEntryController@Cancel']);

//-------------------------イベント状態変更--------------------------------
Route::post('/event/{event_code}/status',['as' => 'post-event-status','uses' => 'EventController@status']);

//-------------------------イベント参加・参加キャンセル------------------------
Route::post('event/{event_code}/join',['as' => 'post-event-join','uses' => 'EventController@join']);

Route::post('event/{event_code}/cancel',['as' => 'post-event-cancel','uses' => 'EventController@cancel']);

//-------------------------ユーザー情報変更--------------------------------
Route::post('/user/setting/profile',['as' => 'post-user-setting-profile','uses' => 'UserController@saveProfile']);

Route::post('/user/setting/tag',['as' => 'post-user-setting-tag','uses' => 'UserController@saveFavoriteTags']);

Route::post('/user/setting/notice',['as'  => 'post-user-setting-notice','uses' => 'UserController@saveNotice']);

//ユーザー登録時の必須項目がなかった時のルート（変更してください
Route::get('/err/503',['as' => '503',function(){
    return view('errors/503');
}]);

});
