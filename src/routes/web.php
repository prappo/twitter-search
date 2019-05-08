<?php

Route::group(['namespace' => 'prappo\twitter\Http\Controllers', 'middleware' => ['web']], function () {
    Route::get('/twitter', 'SearchController@index');

    Route::post('/twitter', function () {

    })->name('search');
});

