<?php

use Illuminate\Support\Facades\Route;

$namespace = "App\Laravel\Controllers\Portal";

Route::group([
    'as' => "portal.",
    'namespace' => $namespace,
    'prefix' => "user",
    'middleware' => ["web"]
], function () {

    include_once app_path("Laravel/Routes/Portal/Auth.php");

    Route::group(['middleware' => "portal.auth"], function () {
        Route::get('/', ['as' => 'dashboard', 'uses' => 'MainController@index']);
        Route::get('cms/home', ['as' => 'cms.home', 'uses' => 'MainController@cmsHome']);
        Route::get('cms/about', ['as' => 'cms.about', 'uses' => 'MainController@cmsAbout']);
        Route::get('cms/contact', ['as' => 'cms.contact', 'uses' => 'MainController@cmsContact']);

        Route::get('profile', ['as' => 'profile.show', 'uses' => 'ProfileController@show']);
        Route::get('profile/edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
        Route::post('profile/edit', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
        Route::post('logout', ['as' => 'logout', 'uses' => 'AuthenticationController@logout']);

        // include_once app_path("#");
    });
});
