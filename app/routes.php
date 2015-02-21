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
Route::get('/',['as' => 'home', 'uses' => 'PagesController@index']);
Route::get('/dashboard',['as' => 'dashboard', 'uses' => 'PagesController@dashboard']);

/*
Feed Routes
*/
Route::get('feed','RssController@index');

/*
Registration Routes
*/
Route::get('/register',['as' => 'registeruser', 'uses' => 'UsersController@create']);
Route::post('/register',['as' => 'registeruser', 'uses' => 'UsersController@store']);

/*
Settings Routes
*/
Route::post('settings/create_and_store_category',['as' => 'create_and_store_category', 'uses' => 'CategoryController@store']);
Route::get('settings/{username}/edit',['as' => 'settings.edit', 'uses' => 'SettingsController@edit']);
Route::any('settings/{username}/update_displayname',['as' => 'update_displayname', 'uses' => 'SettingsController@update_displayname']);
Route::any('settings/{username}/update_categories',['as' => 'update_categories', 'uses' => 'SettingsController@update_categories']);

/*
Category Routes
*/
Route::get('/fire','SettingsController@add_categories');
/*
Sessions Routes
*/
Route::get('/login',['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('/logout',['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::post('/storesession',['as' => 'storesession', 'uses' => 'SessionsController@store']);

/*
Posts Routes
*/
Route::resource('post','PostsController', ['only' => ['edit','update','create','store']]);
Route::get('/post/{id}/unpublish',['as' => 'unpublish', 'uses' => 'PostsController@unpublish']);
Route::get('/post/{id}/publish',['as' => 'publish', 'uses' => 'PostsController@publish']);
Route::get('/post/{id}/destroy',['as' => 'destroy', 'uses' => 'PostsController@destroy']);
Route::get('/post/{id}/softDelete',['as' => 'trash', 'uses' => 'PostsController@softDelete']);
Route::get('/post/{id}/restore',['as' => 'restore', 'uses' => 'PostsController@restore']);
Route::get('/post/{id}','PostsController@show');