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
	if(!Auth::Check()) {
		return Redirect::to('/main');
	} else {
		return View::make('loggedin');
	}
});

Route::get("/register", "UsersController@register");
Route::post("/register", "UsersController@create");

Route::get("/main", "UsersController@main");
Route::post("/login", "UsersController@signin");

Route::get("/logout", "UsersController@doLogout");

Route::post("/webservice", "WebservicesController@getData");