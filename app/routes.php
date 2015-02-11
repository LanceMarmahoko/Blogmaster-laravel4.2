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

Route::get('settings/{username}',['as' => 'settings.edit', 'uses' => 'SettingsController@edit']);

// Route::get('/dashboard/settings/{username}/update',['as' => 'updateuser', 'uses' => 'UsersController@update']);

Route::get('/login',['as' => 'login', 'uses' => 'SessionsController@create']);

Route::get('/logout',['as' => 'logout', 'uses' => 'SessionsController@destroy']);

Route::post('/storesession',['as' => 'storesession', 'uses' => 'SessionsController@store']);


Route::get('/dashboard',['as' => 'dashboard', 'uses' => 'PagesController@dashboard']);


Route::resource('post','PostsController', ['only' => ['edit','update','create','store']]);


Route::get('/post/{id}/unpublish',['as' => 'unpublish', 'uses' => 'PostsController@unpublish']);

Route::get('/post/{id}/publish',['as' => 'publish', 'uses' => 'PostsController@publish']);

Route::get('/post/{id}/destroy',['as' => 'destroy', 'uses' => 'PostsController@destroy']);

Route::get('/post/{id}/softDelete',['as' => 'trash', 'uses' => 'PostsController@softDelete']);

Route::get('/post/{id}/restore',['as' => 'restore', 'uses' => 'PostsController@restore']);


Route::get('/{id}',['as' => 'showpost', 'uses' => 'PagesController@show']);
