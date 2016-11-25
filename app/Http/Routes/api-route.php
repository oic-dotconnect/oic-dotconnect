<?php //Created at: 16-09-05 13:27:21

Route::get('/api/candidacy_tags', 'API\CandidacyTagController@index');

Route::get('/api/events','API\EventController@index');

Route::get('/api/user/{code}/favorite_tags','API\FavoriteTagController@index');
