<?php

use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::get('cms/home', ['as' => 'cms.home', 'uses' => 'CMS\HomeController@index']);
    Route::post('cms/home', ['as' => 'cms.update_home', 'uses' => 'CMS\HomeController@update']);

    Route::get('cms/about', ['as' => 'cms.about', 'uses' => 'CMS\AboutController@index']);
    Route::post('cms/about', ['as' => 'cms.update_about', 'uses' => 'CMS\AboutController@update']);

    Route::get('cms/contact', ['as' => 'cms.contact', 'uses' => 'CMS\ContactController@index']);
    Route::post('cms/contact', ['as' => 'cms.update_contact', 'uses' => 'CMS\ContactController@update']);
});
