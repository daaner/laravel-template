<?php

Route::get('', ['as' => 'admin.dashboard', function () {
    $content = 'Тут информация';

    return AdminSection::view($content, 'Панель');
}]);

Route::namespace('App\Http\Controllers')->group(function () {
    // Route::post('service/exel', 'AdminServiceController@exportExel')->name('export_exel');
    Route::get('service/clearcache', 'AdminController@clearCache')->name('clear_cache');
});

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'admin']], function () {
// 	\UniSharp\LaravelFilemanager\Lfm::routes();
// });
//
// Route::get('fm', ['as' => 'admin.filemanager', function () {
// 	$content = '<iframe src="laravel-filemanager" style="width: 100%; height: 80vh; overflow: hidden; border: none;"></iframe>';
// 	return AdminSection::view($content, trans('laravel-filemanager::lfm.title-page'));
// }]);
