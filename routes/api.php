<?php

use Illuminate\Http\Request;


Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
