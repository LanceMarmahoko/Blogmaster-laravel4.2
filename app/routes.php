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


/*
Page Routes
*/
Route::get('/',['as' => 'home', 'uses' => 'SessionsController@create']);
Route::get('/dashboard',['as' => 'dashboard', 'uses' => 'PagesController@dashboard']);
Route::get('/json',['as' => 'json', 'uses' => 'PagesController@index']);

/*
Feed Routes
*/
Route::get('feed','RssController@index');

/*
Registration Routes
*/
Route::get('/register',['as' => 'register_user', 'uses' => 'UsersController@create']);
Route::post('/register',['as' => 'register_user', 'uses' => 'UsersController@store']);

/*
Settings Routes
*/
Route::post('settings/create_and_store_category',['as' => 'create_and_store_category', 'uses' => 'CategoryController@store']);
Route::get('settings/{username}/edit',['as' => 'settings.edit', 'uses' => 'SettingsController@edit']);
Route::any('settings/{username}/update_display_name',['as' => 'update_display_name', 'uses' => 'SettingsController@update_display_name']);

/*
Sessions Routes
*/
Route::get('/login',['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('/logout',['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::post('/store_session',['as' => 'store_session', 'uses' => 'SessionsController@store']);

/*
Posts Routes
*/
Route::resource('post','PostsController', ['only' => ['edit','update','create','store']]);
Route::get('/post/{id}/unpublish',['as' => 'unpublish', 'uses' => 'PostsController@unpublish']);
Route::get('/post/{id}/publish',['as' => 'publish', 'uses' => 'PostsController@publish']);
Route::get('/post/{id}/destroy',['as' => 'destroy', 'uses' => 'PostsController@destroy']);
Route::get('/post/{id}/soft_delete',['as' => 'trash', 'uses' => 'PostsController@soft_delete']);
Route::get('/post/{id}/restore',['as' => 'restore', 'uses' => 'PostsController@restore']);
Route::get('/post/{id}',['as' => 'showPost','uses' => 'PagesController@show']);