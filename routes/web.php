<?php

//localization Vue
Route::get('/js/ru.js', 'LocaleController@assets_ru')->name('assets.lang.ru');
Route::get('/js/en.js', 'LocaleController@assets_en')->name('assets.lang.en');

Route::get('logout', 'Api\AuthController@logout_get')->name('logout_get');
Route::post('logout', 'Api\AuthController@logout_get')->name('logout');
Route::get('login', 'Api\AuthController@login_get')->name('login');

Route::get('/', function () {
    return view('welcome');
});

//dev
Route::get('/icons', function () {
    return view('icons');
});
Route::get('/content', function () {
    return view('content');
});
Route::get('/content2', function () {
    return view('content2');
});

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
