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

Route::get('/dashboard/myprofile/{username}/edit',['as' => 'edituser', 'uses' => 'UsersController@edit']);
Route::get('/dashboard/myprofile/{username}/update',['as' => 'updateuser', 'uses' => 'UsersController@update']);

Route::get('/login',['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('/logout',['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::post('/storesession',['as' => 'storesession', 'uses' => 'SessionsController@store']);

Route::get('/dashboard',['as' => 'dashboard', 'uses' => 'PagesController@dashboard']);

Route::resource('dashboard','PostsController', ['only' => ['edit','update','create','store']]);

Route::get('/dashboard/{id}/destroy',['as' => 'destroy', 'uses' => 'PostsController@destroy']);

Route::get('/{id}',['as' => 'showpost', 'uses' => 'PagesController@show']);
