<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => "articles", 'as' => 'article.'], function () {
    Route::post('/', ['as' => 'article', 'uses' => 'ArticleController@index']);
    Route::post('info/{id?}', ['as' => 'article.info', 'uses' => 'ArticleController@show']);
    Route::post('create', ['as' => 'article.create', 'uses' => 'ArticleController@store']);
    Route::post('edit/{id?}', ['as' => 'article.edit', 'uses' => 'ArticleController@update']);
    Route::post('delete/{id?}', ['as' => 'article.delete', 'uses' => 'ArticleController@destroy']);
});
