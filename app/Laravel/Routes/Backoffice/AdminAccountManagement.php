<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin-account-management', 'as' => 'admin_account_management.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'AdminAccountManagementController@index']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'AdminAccountManagementController@edit']);
    Route::post('edit/{id}', ['as' => 'update', 'uses' => 'AdminAccountManagementController@update']);
    Route::get('show/{id}', ['as' => 'show', 'uses' => 'AdminAccountManagementController@show']);
    Route::delete('delete/{id}', ['as' => 'delete', 'uses' => 'AdminAccountManagementController@delete']);
});
