<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => "auth", 'as' => 'auth.'], function () {
    Route::post('register', ['as' => 'register', 'uses' => 'AuthenticationController@register']);
    Route::post('login', ['as' => 'login', 'uses' => 'AuthenticationController@login']);
});

Route::group(['prefix' => "auth", 'as' => 'auth.', 'middleware' => 'api.auth'], function () {
    Route::post('logout', ['as' => 'logout', 'uses' => 'AuthenticationController@logout']);
    Route::post('refresh-token', ['as' => 'refresh_token', 'uses' => 'AuthenticationController@refresh_token']);
    Route::post('check-login', ['as' => 'check_login', 'uses' => 'AuthenticationController@check_login']);
});






// Route::group(['as' => 'auth.', 'middleware' => "api.auth"], function () {
//     Route::post('register', ['uses' => 'AuthenticationController@register']);
//     Route::post('login', ['uses' => 'AuthenticationController@login']);
//     Route::post('logout', ['as' => 'article.logout', 'uses' => 'AuthenticationController@logout']);
//     Route::post('refresh-token', ['as' => 'article.refresh_token', 'uses' => 'AuthenticationController@refresh_token']);
//     Route::post('check-login', ['as' => 'article.check_login', 'uses' => 'AuthenticationController@check_login']);
// });


    // Route::group(['prefix' => "auth",'as' => 'auth.'],function(){
    //     Route::post('register','AuthenticationController@register')->name('register');
    //     Route::post('login','AuthenticationController@login')->name('login');
    //     Route::post('logout','AuthenticationController@logout')->name('logout')->middleware(["api.auth"]);
    //     Route::post('refresh-token','AuthenticationController@refresh_token')->name('refresh_token')->middleware(["api.auth"]);
    //     Route::post('check-login','AuthenticationController@check_login')->name('check_login')->middleware(["api.auth"]);
    // });
