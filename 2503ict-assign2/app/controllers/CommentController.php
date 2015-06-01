<?php

class CommentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($p_id)
	{
		$comments = Comment::whereHas('posts', function($q)
		{
			$q->where('post_id', 'like', $p_id);
		})->get();
		
		return View::make('posts.comments', compact('comments'));
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
		
		$valid = Validator::make($input, Comment::$rules);
		
		if ($valid->passes()){
	
 			$comment = new Comment;
 		
 			$comment->message = $input['message'];
 			$comment->user_id = $input['id'];
 			$comment->post_id = $input['post_id'];
			
		
 			$comment->save();
 			return Redirect::to(URL::previous());
		} else {
			return Redirect::to(URL::previous())->withErrors($valid);
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
		$comments = Comment::CommentsForPost($id)->paginate(8);
		$post = Post::find($id);
		
		return View::make('posts.comments', compact('comments'), compact('post'));
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
		
		$comment = Comment::find($id);

		$comment->delete();

		return Redirect::to(URL::previous());
	}


}
