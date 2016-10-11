<?php

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

Route::get('/', function () {
	$data = [];
	$data["new_events"] = \App\Models\Event::orderby('open_date','desc')->take(5)->with('Tags')->get()->each(function($event){
			$event["entry_num"] = $event->entry_num();
	});
	$data["hold_events"] = \App\Models\Event::Beforehold()->take(5)->with('Tags')->orderby('openig_date')->get()->each(function($event){
			$event["entry_num"] = $event->entry_num();
	});
    return view('landing',$data);
});

Route::get('/view/{name}', function ($name) {
    return view($name);
});

Route::get('auth/login/google', [
  'as' => 'sociallogin', 'uses' => 'Auth\SocialController@getGoogleAuth'
]);
Route::get('auth/login/callback/google', 'Auth\SocialController@getGoogleAuthCallback');


