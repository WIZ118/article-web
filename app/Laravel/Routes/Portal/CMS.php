<?php

use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::get('cms/articles', ['as' => 'cms.articles', 'uses' => 'CMS\ArticleController@index']);
    Route::post('cms/articles', ['as' => 'cms.articles.store', 'uses' => 'CMS\ArticleController@store']);
    Route::post('cms/articles/{id}/update', ['as' => 'cms.articles.update', 'uses' => 'CMS\ArticleController@update']);
    Route::post('cms/articles/{id}/delete', ['as' => 'cms.articles.delete', 'uses' => 'CMS\ArticleController@destroy']);

    Route::get('cms/home', ['as' => 'cms.home', 'uses' => 'CMS\HomeController@index']);
    Route::post('cms/home', ['as' => 'cms.update_home', 'uses' => 'CMS\HomeController@update']);

    Route::get('cms/about', ['as' => 'cms.about', 'uses' => 'CMS\AboutController@index']);
    Route::post('cms/about', ['as' => 'cms.update_about', 'uses' => 'CMS\AboutController@update']);

    Route::get('cms/contact', ['as' => 'cms.contact', 'uses' => 'CMS\ContactController@index']);
    Route::post('cms/contact', ['as' => 'cms.update_contact', 'uses' => 'CMS\ContactController@update']);
});
