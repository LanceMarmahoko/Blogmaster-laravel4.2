<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/',['as' => 'home', 'uses' => 'PagesController@index']);

Route::get('feed','RssController@index');

Route::get('/register',['as' => 'registeruser', 'uses' => 'UsersController@create']);

Route::post('/register',['as' => 'registeruser', 'uses' => 'UsersController@store']);


Route::resource('settings','SettingsController',['only' => ['update','create','store']]);
Route::get('settings/{username}/edit',['as' => 'settings', 'uses' => 'SettingsController@edit']);

// Route::get('/dashboard/settings/{username}/update',['as' => 'updateuser', 'uses' => 'UsersController@update']);



Route::get('/login',['as' => 'login', 'uses' => 'SessionsController@create']);

Route::get('/logout',['as' => 'logout', 'uses' => 'SessionsController@destroy']);

Route::post('/storesession',['as' => 'storesession', 'uses' => 'SessionsController@store']);

Route::get('/dashboard',['as' => 'dashboard', 'uses' => 'PagesController@dashboard']);

Route::resource('dashboard','PostsController', ['only' => ['edit','update','create','store']]);

Route::get('/dashboard/{id}/unpublish',['as' => 'unpublish', 'uses' => 'PostsController@unpublish']);

Route::get('/dashboard/{id}/publish',['as' => 'publish', 'uses' => 'PostsController@publish']);

Route::get('/dashboard/{id}/destroy',['as' => 'dest{username}/roy', 'uses' => 'PostsController@destroy']);

Route::get('/dashboard/{id}/softDelete',['as' => 'trash', 'uses' => 'PostsController@softDelete']);

Route::get('/dashboard/{id}/restore',['as' => 'restore', 'uses' => 'PostsController@restore']);

Route::get('/{id}',['as' => 'showpost', 'uses' => 'PagesController@show']);
