<?php


use Illuminate\Support\Facades\Route;

$namespace = "App\Laravel\Controllers\Api";

Route::group([
    'as' => "api.",
    'namespace' => $namespace,
    'middleware' => ["api"]
], function () {
    Route::get('/', 'SettingController@health')->name('health');

    include app_path("Laravel/Routes/Api/Auth.php");

    Route::group(['middleware' => "api.auth"], function () {
        Route::group(['prefix' => "profile", 'as' => 'profile.'], function () {
            Route::post('info', 'ProfileController@show')->name('info');
        });

        include app_path("Laravel/Routes/Api/Article.php");
    });
});
