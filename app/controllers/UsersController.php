<?php

class UsersController extends BaseController {

	public function register()
	{
		return View::make('register');
	}

	public function create()
	{
		$rules = array(
        'name'             => 'required|min:5',              
        'email'            => 'required|email|unique:users',
        'password'         => 'required|min:5',
        'password_confirmation' => 'required|same:password');


		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('register')->withErrors($validator);
		} else {
			$user = new User;
			$user->name = Input::get("name");
			$user->email = Input::get("email");
			$user->password = Hash::make(Input::get("password"));

			$user->save();
			return Redirect::to("/login")->withMessage("Köszönjük a sikeres regisztrációt, bejelentkezhet!");
		}
	}

	public function main()
	{
		if(!Auth::Check()) {
			return View::make('login');
		} else {
			return View::make('loggedin');
;
		}

	}

	public function signin()
	{
		$user = array(
			'email'     => Input::get('email'),
			'password'  => Input::get('pw')
		);

		if (Auth::attempt($user)) {
			$back = [];
			$back[0] = View::make('dashboard')->render();
			$back[1] = View::make('logout')->render();
			return $back;
		} else {
			return null;
		}
	}

	public function doLogout()
	{
		if(Auth::Check()) {
			Auth::logout();
		}
		return Redirect::to("/");
	}
}
