<?php

use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::get('profile', ['as' => 'profile.show', 'uses' => 'ProfileController@show']);
    Route::get('profile/edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::post('profile/edit', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
});
