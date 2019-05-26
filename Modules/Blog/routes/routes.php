<?php

Route::prefix('/blog')->namespace('Modules\Blog\Http\Controllers')->group(function () {

  Route::get('/', 'BlogController@index')->name('blog');
  
  // Route::get('/', function () {
  //   return view('Blog::index');
  // });

});
