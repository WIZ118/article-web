<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin-account-management', 'as' => 'admin_account_management.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'AccountManagementController@index']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'AccountManagementController@edit']);
    Route::post('edit/{id}', ['as' => 'update', 'uses' => 'AccountManagementController@update']);
    Route::get('show/{id}', ['as' => 'show', 'uses' => 'AccountManagementController@show']);
    Route::delete('delete/{id}', ['as' => 'delete', 'uses' => 'AccountManagementController@delete']);
});

Route::group(['prefix' => 'user-account-management', 'as' => 'user_account_management.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'UserAccountManagementController@index']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'UserAccountManagementController@edit']);
    Route::post('edit/{id}', ['as' => 'update', 'uses' => 'UserAccountManagementController@update']);
    Route::get('show/{id}', ['as' => 'show', 'uses' => 'UserAccountManagementController@show']);
    Route::delete('delete/{id}', ['as' => 'delete', 'uses' => 'UserAccountManagementController@delete']);
});
