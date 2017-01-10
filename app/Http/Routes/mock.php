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