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

// イベント登録ページ
Route::get('/event/entry',['as' =>'event-entry',function(){
    return view('event/event-entry');
}]);

// イベント編集ページ
Route::get('/event/edit',['as' =>'event-edit',function(Request $request){
    $data['code'] = $request->input("code");
    return view('event/event-edit',$data);
}]);

// イベント管理ページ
Route::get('/event/control',['as' =>'event-control',function(){
    return view('event/event-control');
}]);

// イベント検索ページ
Route::get('/event/search',['as' =>'event-search',function(){
    return view('event/event-search');
}]);

// イベント詳細ページ
Route::get('/event/detail',['as' =>'event-detail','uses' => 'EventController@detail']);

// プロフィール登録ページ
Route::get('/user/entry/profile',['as' =>'user-entry-profile',function(){
    return view('user/user-entry-profile');
}]);

// お気に入りタグ登録ページ
Route::get('/user/entry/tag',['as' =>'user-entry-tag',function(){
    return view('user/user-entry-tag');
}]);

// ユーザー登録確認ページ
Route::get('/user/entry/confirm',['as' =>'user-entry-confirm','uses' => 'UserEntryController@Confirm']);

// マイページ
Route::get('/user/mypage',['as' =>'user-mypage',function(){
    return view('user/user-mypage');
}]);

// ユーザーページ
Route::get('/user',['as' =>'user',function(Request $request){
    $data['code'] = $request->input("code");
    return view('user/user',$data);
}]);

// お気に入りタグ編集ページ
Route::get('/user/setting/tag',['as' =>'user-setting-tag',function(Request $request){
    $data['code'] = $request->input("code");
    return view('user/user-setting-tag',$data);
}]);

// プロフィール編集ページ
Route::get('/user/setting/profile',['as' =>'user-setting-profile',function(Request $request){
    $data['code'] = $request->input("code");
    return view('user/user-setting-profile',$data);
}]);

// 通知設定ページ
Route::get('/user/setting/notice',['as' =>'user-setting-notice',function(Request $request){
    $data['code'] = $request->input("code");
    return view('user/user-setting-notice',$data);
}]);

//　退会ページ
Route::get('/user/setting/leave',['as' =>'user-setting-leave',function(Request $request){
    $data['code'] = $request->input("code");
    return view('user/user-setting-leave',$data);
}]);

//-------------------------ユーザー登録-----------------------------------

// ユーザー登録（コントローラーへ）
Route::post('/user/entry/profile','UserEntryController@InputProfile');

//ユーザーお気に入りタグ登録（コントローラーへ）
Route::post('/user/entry/tag','UserEntryController@InputTag');

//ユーザー登録コントローラーへ
Route::post('/user/create','UserEntryController@Create');

