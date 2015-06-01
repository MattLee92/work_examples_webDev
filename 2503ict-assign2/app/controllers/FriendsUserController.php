<?php

class FriendsUserController extends \BaseController {

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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		
		$friend = new FriendsUser;
		$friend->user_id = $input['adder_id'];
		$friend->friend_id = $input['friend_id'];
		
		$friend->save();
		
		return Redirect::to(URL::previous());
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	
		$friends = FriendsUser::whereRaw('friend_id = ?', array($id))->get();
		//$friends = FriendsUser::all();
		foreach( $friends as $friend){
			$users = User::whereRaw('id = ?', array($friend));
		}

		return View::make('users.friends',compact('friends'));
		
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
		$user = User::find($id);
		$friend = Input::only('friend_id');
	
		$friend = FriendsUser::whereRaw('user_id = ? and friend_id = ?', array($user->id, $friend))->delete();
		return Redirect::to(URL::previous());
	}


}
