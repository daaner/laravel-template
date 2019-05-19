<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// $lang = config('app.locale');

//localization Vue
Route::get('/js/ru.js', 'LocaleController@assets_ru')->name('assets.lang.ru');
Route::get('/js/en.js', 'LocaleController@assets_en')->name('assets.lang.en');



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
