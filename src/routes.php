<?php

// Login
Route::get('/admin/login', 'DavidWeber\Dominion\Controllers\AdminController@getLogin');
Route::post('/admin/login', 'DavidWeber\Dominion\Controllers\AdminController@postLogin');
Route::get('/admin/logout', 'DavidWeber\Dominion\Controllers\AdminController@getLogout');

Route::group(array('before' => 'admin'), function() {

    // Users
    Route::get('/admin/users', 'DavidWeber\Dominion\Controllers\UserController@getIndex');
    Route::get('/admin/users/create', 'DavidWeber\Dominion\Controllers\UserController@getCreate');
    Route::post('/admin/users/create', 'DavidWeber\Dominion\Controllers\UserController@postCreate');
    Route::get('/admin/users/edit/{id}', 'DavidWeber\Dominion\Controllers\UserController@getEdit');
    Route::post('/admin/users/edit/{id}', 'DavidWeber\Dominion\Controllers\UserController@postEdit');
    Route::post('/admin/users/delete/{id}', 'DavidWeber\Dominion\Controllers\UserController@postDelete');

    // Roles
    Route::get('/admin/roles/create', 'DavidWeber\Dominion\Controllers\RoleController@getCreate');
    Route::post('/admin/roles/create', 'DavidWeber\Dominion\Controllers\RoleController@postCreate');
    Route::get('/admin/roles/edit/{id}', 'DavidWeber\Dominion\Controllers\RoleController@getEdit');
    Route::post('/admin/roles/delete/{id}', 'DavidWeber\Dominion\Controllers\RoleController@postDelete');
    Route::get('/admin/roles', 'DavidWeber\Dominion\Controllers\RoleController@getIndex');

    // Modules
    Route::get('/admin/modules/create', 'DavidWeber\Dominion\Controllers\ModuleController@getCreate');
    Route::post('/admin/modules/create', 'DavidWeber\Dominion\Controllers\ModuleController@postCreate');
    Route::get('/admin/modules/edit/{id}', 'DavidWeber\Dominion\Controllers\ModuleController@getEdit');
    Route::post('/admin/modules/edit/{id}', 'DavidWeber\Dominion\Controllers\ModuleController@postEdit');
    Route::post('/admin/modules/delete/{id}', 'DavidWeber\Dominion\Controllers\ModuleController@postDelete');
    Route::get('/admin/modules', 'DavidWeber\Dominion\Controllers\ModuleController@getIndex');

    // Module Groups
    Route::get('/admin/modulegroups/create', 'DavidWeber\Dominion\Controllers\ModuleGroupController@getCreate');
    Route::post('/admin/modulegroups/create', 'DavidWeber\Dominion\Controllers\ModuleGroupController@postCreate');
    Route::post('/admin/modulegroups/delete/{id}', 'DavidWeber\Dominion\Controllers\ModuleGroupController@postDelete');
    Route::get('/admin/modulegroups', 'DavidWeber\Dominion\Controllers\ModuleGroupController@getIndex');
    Route::get('/admin/modulegroups/view/{id}', 'DavidWeber\Dominion\Controllers\ModuleGroupController@getView');

    // Log Viewer
    Route::get('/admin/logs', 'DavidWeber\Dominion\Controllers\LogController@getIndex');
    Route::get('/admin/logs/view', 'DavidWeber\Dominion\Controllers\LogController@getView');

    // Dashboard
    Route::get('/admin', 'DavidWeber\Dominion\Controllers\AdminController@getIndex');
});
