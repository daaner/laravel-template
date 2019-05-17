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

Route::get('/data-cache-clear', 'AdminController@clearCache')->name('cache_clear');

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
