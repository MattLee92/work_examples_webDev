<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$friends = 0;

	/*	if (Auth::check())
		{
			$logged = Auth::user()->id;
			//$friends = FriendsUser::whereRaw('friend_id = ? and user_id = ?', array() $logged))->count();
			
			if ($user->id == $logged){
				$posts = Post::whereRaw('user_id = ?', array($user->id))->get();
			} elseif ($friends != 0){ //if friends
				$posts = Post::whereRaw('user_id = ? and (privacy_level = ? or privacy_level =  ?)', array($user->id, 'Friends','Public'))->get();
			} else {
				$posts = Post::whereRaw('user_id = ? and privacy_level = ?', array($user->id, 'Public'))->get();
			}
			
			
			
			
		} else { */
			$posts = Post::whereRaw('privacy_level = ?', array('Public'))->get();
	//	}
	
		
	
		return View::make('posts.displaypost',compact('posts'));//->withFriends($friends);
		
		
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
		
		$valid = Validator::make($input, Post::$rules);
		
		if ($valid->passes()){
		
		$post = new Post;
		$post->user_id = $input['id'];
		$post->title = $input['title'];
		$post->message = $input['message'];
		$post->privacy_level = $input['privacy_level'];
		
		$post->save();
		
		return Redirect::route('post.index');
		} else {
			return Redirect::route('post.index')->withErrors($valid);
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
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		return View::make('posts.edit_post', compact('post'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Post::find($id);
		
		$input = Input::all();
		
		$valid = Validator::make($input, Post::$rules);
		
		if ($valid->passes()){
		
		$post->title = $input['title'];
		$post->message = $input['message'];
		$post->privacy_level = $input['privacy_level'];
		
		$post->save();
		
		return Redirect::route('post.index');
		} else {
		return Redirect::route('post.edit',compact('id'))->withErrors($valid);			
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

		$post = Post::find($id);
		$comments = Comment::whereRaw('post_id = ?', array($id))->get();
		$post->delete();
		
		return Redirect::to(URL::previous());
	}
	
	public function doc ()
	{
		return View::make('posts.documentation');
	}

}
