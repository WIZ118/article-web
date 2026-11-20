<?php

use Illuminate\Support\Facades\Route;

$namespace = "App\Laravel\Controllers\Backoffice";

Route::group([
    'as' => "backoffice.",
    'namespace' => $namespace,
    'prefix' => "admin",
    'middleware' => ["web"]
], function () {

    include_once app_path("Laravel/Routes/Backoffice/Auth.php");

    Route::group(['middleware' => "backoffice.auth"], function () {
        Route::get('/', ['as' => 'dashboard', 'uses' => 'MainController@index']);
        Route::get('profile', ['as' => 'profile.show', 'uses' => 'ProfileController@show']);
        Route::get('profile/edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
        Route::post('profile/edit', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
        Route::post('logout', ['as' => 'logout', 'uses' => 'AuthenticationController@logout']);

        include_once app_path("Laravel/Routes/Backoffice/Backoffice.php");
    });
});
