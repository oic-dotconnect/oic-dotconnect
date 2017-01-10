<?php //Created at: 16-09-05 13:45:33

use Illuminate\Http\Request;

Route::get('/mock/landing','MockController@landing');

Route::get('/mock/mypage','MockController@mypage');

Route::get('/mock/vuetest',function(){
  return view('mock.vuetest');
});

Route::post('/mock/posttest',[ 'as' => 'posttest', function(Request $request) {
  $data['requests'] = $request->all();
  return view('mock.posttest', $data);
}]);

Route::get('/mock/organize','MockController@organize');
Route::group(['middleware' => 'dev'], function () {
  Route::get('/mock/pagelist',function() {
    return view('mock.page-list');
  });
});

Route::get('/mock/userlist', function() {
  $data['users'] = App\Models\User::all();
  return view('mock.userlist', $data);
});

Route::get('/mock/auth/{user_code}', function($user_code) {
  $user = App\Models\User::findCode($user_code);
  Auth::logout();
  Auth::login($user);
  return redirect()->route('landing');			
});