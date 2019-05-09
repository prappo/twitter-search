<?php

Route::group(['namespace' => 'prappo\twitter\Http\Controllers', 'middleware' => ['web']], function () {
    Route::get('/twitter/search', 'SearchController@index');

    Route::post('/twitter/search', 'SearchController@search')->name('search');
});

