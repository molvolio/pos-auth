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

Route::get('/', function()
{
	return Redirect::to('/login');
});

Route::get("/register", "UsersController@register");
Route::post("/register", "UsersController@create");

Route::get("/login", "UsersController@login");
Route::post("/login", "UsersController@signin");

Route::get("/logout", "UsersController@doLogout");