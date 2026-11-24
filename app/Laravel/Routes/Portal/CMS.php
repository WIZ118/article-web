<?php

use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::get('cms/home', ['as' => 'cms.home', 'uses' => 'MainController@cmsHome']);
    Route::get('cms/about', ['as' => 'cms.about', 'uses' => 'MainController@cmsAbout']);
    Route::get('cms/contact', ['as' => 'cms.contact', 'uses' => 'MainController@cmsContact']);
});
