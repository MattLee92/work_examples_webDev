<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('users.search');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$image = Input::file('image');
		$valid = Validator::make($input, User::$rules);
		
		if ($valid->passes()){
			$password = $input['password'];
 			$encrypted = Hash::make($password);
 			$dob = $input['month'] &','& $input['day'] &','& $input['year'];
 		
 			$user = new User;
 		
 			$user->image = $input['image'];
 			$user->fullname = $input['name'];
 			$user->email = $input['email'];
 			$user->dob = $dob;
			$user->password = $encrypted;
	
			

 			$user->save();
 			
 			return Redirect::route('post.index');
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
		$user = User::find($id);
	
		$friends = 0;
		
		
		$now_date = new DateTime;
		$birth_date = new DateTime($user->dob);
		$interval = $birth_date->diff($now_date);

		if (Auth::check())
		{
			$logged = Auth::user()->id;
			$friends = FriendsUser::whereRaw('friend_id = ? and user_id = ?', array($user->id, $logged))->count();
			
			if ($id == $logged){
				$posts = Post::whereRaw('user_id = ?', array($id))->get();
			} elseif ($friends != 0){ //if friends
				$posts = Post::whereRaw('user_id = ? and (privacy_level = ? or privacy_level =  ?)', array($id, 'Friends','Public'))->get();
			} else {
				$posts = Post::whereRaw('user_id = ? and privacy_level = ?', array($id, 'Public'))->get();
			}
			
			
			
			
		} else {
			$posts = Post::whereRaw('user_id = ? and privacy_level = ?', array($id, 'Public'))->get();
		}
	
		
	
		return View::make('users.profile',compact('user'))->withPosts($posts)->withFriends($friends)->withAge($interval->y);
		
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return View::make('users.update', compact('user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		$input = Input::all();
	
		$valid = Validator::make($input, User::$rulesUpdate);
		
		if ($valid->passes()){
			$password = $input['password'];
 			$encrypted = Hash::make($password);
 			$dob = $input['month'] &','& $input['day'] &','& $input['year'];
 		
 			$user->fullname = $input['name'];
 		
 			$user->dob = $dob;
			$user->password = $encrypted;
		
			$user->image = $input['image'];

 			$user->save();
 			
 			return Redirect::route('post.index');
		} else {
			return Redirect::to(URL::previous())->withErrors($valid);
		}
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
	/**
	 * Search for Users from string
	 * @return Users
	 */
	public function search()
	{
		$query = Input::get('srch');
		$searchRes = User::whereRaw('fullname like ?', array('%'.$query.'%'))->get();
		
		return View::make('users.search',compact('searchRes'))->withSrch($query);
	}
	
	/**
	 * Attempt login from given credentials
	 * 
	 */
	public function login()
	{
		$user = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);
			
		if (Auth::attempt($user)){
		
			return Redirect::to(URL::previous());
		} else {
			Session::put('login_error', 'Login Failed');
			return Redirect::to(URL::previous())->withInput();
		}
	}
	/**
	 * Logout the current user
	 * 
	 */
	public function logout()
	{
		Auth::logout();
		Session::put('login_error', '');
		return Redirect::action('PostController@index');
	}

}
