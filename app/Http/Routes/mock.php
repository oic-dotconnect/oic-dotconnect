<?php //Created at: 16-09-05 13:45:33

Route::get('/mock/landing','MockController@landing');

Route::get('/mock/mypage','MockController@mypage');

Route::get('/mock/vuetest',function(){
  return view('vuetest');
});
