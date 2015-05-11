<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		
		$valid = Validator::make($input, User::$rules);
		
		if ($valid->passes()){
			$password = $input['password'];
 			$encrypted = Hash::make($password);
 		
 			$user = new User;
 		
 			$user->username = $input['username'];
			$user->password = $encrypted;
		
 			$user->save();
 		return Redirect::route('product.index');
		} else {
			return Redirect::route('user.create')->withErrors($valid);
		}
		
	
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function login()
	{
		$user = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);
			
		if (Auth::attempt($user)){
			return Redirect::to(URL::previous());
		} else {
			Session::put('login_error', 'Login Failed!');
			return Redirect::to(URL::previous())->withInput();
		}
	}

	public function logout()
	{
		Auth::logout();
		Session::put('login_error', '');
		return Redirect::action('ProductController@index');
	}
}
