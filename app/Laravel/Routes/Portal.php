<?php

use Illuminate\Support\Facades\Route;

$namespace = "App\Laravel\Controllers\Portal";

Route::group([
    'as' => "portal.",
    'namespace' => $namespace,
    'prefix' => "user",
    'middleware' => ["web"]
], function () {

    include app_path("Laravel/Routes/Portal/Auth.php");

    Route::group(['middleware' => "portal.auth"], function () {
        Route::get('/', ['as' => 'dashboard', 'uses' => 'MainController@index']);

        Route::post('logout', ['as' => 'logout', 'uses' => 'AuthenticationController@logout']);

        include app_path("Laravel/Routes/Portal/CMS.php");
        include app_path("Laravel/Routes/Portal/Profile.php");
    });
});
