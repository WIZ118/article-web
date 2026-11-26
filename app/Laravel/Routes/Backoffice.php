<?php

use Illuminate\Support\Facades\Route;

$namespace = "App\Laravel\Controllers\Backoffice";

Route::group([
    'as' => "backoffice.",
    'namespace' => $namespace,
    'prefix' => "admin",
    'middleware' => ["web"]
], function () {

    include app_path("Laravel/Routes/Backoffice/Auth.php");

    Route::group(['middleware' => "backoffice.auth"], function () {
        Route::get('/', ['as' => 'dashboard', 'uses' => 'MainController@index']);

        Route::post('logout', ['as' => 'logout', 'uses' => 'AuthenticationController@logout']);

        include app_path("Laravel/Routes/Backoffice/AdminAccountManagement.php");
        include app_path("Laravel/Routes/Backoffice/UserAccountManagement.php");
        include app_path("Laravel/Routes/Backoffice/Profile.php");
    });
});
