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


//Route to display all posts on Homepage
Route::get('/', function()
{
	$results = getPosts();

  //If there are posts ($results is  NOT empty) return all  posts and the count
  //for their comments. Else ($results is empty) return only the empty $results
  //in any case return Success as true as the user has not attemped to add a post
  //and therefore Success can't be false.
	if (!empty($results)){
	  	$counts = get_comment_count($results);
	    return View::make("Posts.display")->withPosts($results)->withCount($counts)->withSuccess(true);
	}else {  
	    return View::make("Posts.display")->withPosts($results)->withSuccess(true);
	}
});


//Route to Add post to database
Route::post('add_post_action', function()
{
  $title = Input::get('title');
  $user = Input::get('name');
  $message = Input::get('msgpost');

  $id = add_post($title, $message, $user);

  // If successfully created then display newly created item
  if ($id) 
  {
    return Redirect::to(url("index.php"));
  }  else
    {
       $results = getPosts();
      //If there are posts ($results is  NOT empty) return all  posts and the count
      //for their comments. Else ($results is empty) return only the empty $results
      //in any case return Success as false as the user has  attemped to add a post
      //and if has failed
    	if (!empty($results)){
	  	  $counts = get_comment_count($results);
	      return View::make("Posts.display")->withPosts($results)->withCount($counts)->withSuccess(false);
	    }else {
	      return View::make("Posts.display")->withPosts($results)->withSuccess(false);
  	}
	
  }
});

//Route to Delete Post from database
Route::get('delete_post_action/{id}', function($id)
{
  delete_post($id);
  return Redirect::to(url("/"));
});

//Route to Delete comment from database
Route::get('delete_comment_action/{id}', function($id)
{
  $pid = Input::get('id');
  delete_comment($id);
  return Redirect::to('/');
});

//Route to create view for Update post
Route::get('update_post/{id}', function($id)
{
  $item = get_post($id);
  return View::make('Posts.edit_post')->withPost($item)->withSuccess(true);
});

//Route to Update Post
Route::post('update_post_action', function()
{
  $id = Input::get('id');
  $title = Input::get('title');
  $msg = Input::get('msg');
  $name = Input::get('name');
  
 $update = update_post($id, $title, $msg, $name);

 if ($update != false) 
  {
    return Redirect::to(url('/'));
  }  else
    { //Update failed, return to view and inform user
        $item = get_post($id);
        return View::make('Posts.edit_post')->withPost($item)->withSuccess(false);
  }

});

//Route to view Comments of Specific post
Route::get('view_comments/{id}', function($id)
{
  $post = get_post($id);
  $comm = get_comments($id);
  return View::make('Posts.comments')->withPost($post)->withComm($comm)->withSuccess(true);
});

//Route to add comment to post (database)
Route::post('add_comment_action', function()
{
  $postid = Input::get('id');
  $user = Input::get('name');
  $message = Input::get('msgpost');

  $didadd = add_comment($message, $user, $postid);

  // If successfully created then display newly created item
  if ($didadd) 
  {
      $post = get_post($postid);
      $comm = get_comments($postid);
      return View::make('Posts.comments')->withPost($post)->withComm($comm)->withSuccess(true);
    
  } 
  else
  { //Update failed return to view and inform user
    $post = get_post($postid);
    $comm = get_comments($postid);
    return View::make('Posts.comments')->withPost($post)->withComm($comm)->withSuccess(false);
  }
});

//Route to Documentation
Route::get('doc_get', function()
{
  return View::make('Posts.documentation');
});
//********************************************~~FUNCTIONS~~********************************************\\

//Function to Return all posts stored in the database
function getPosts(){
	
	$sql = "SELECT * FROM posts ORDER BY datetime DESC";
	$posts = DB::select($sql);
	return $posts;
}

//Function to get the count of comments for each post
function get_comment_count($post)
{
  
    foreach($post as $ps){
    	$sql = "SELECT COUNT(*) AS commcount FROM comments WHERE p_id=?";
	   $count[$ps->id] = DB::select($sql,array($ps->id))[0]->commcount;
    }
   
	  return $count;

}

//Function to get the comments for a specific post
function get_comments($id)
{
  $sql = "SELECT * FROM comments WHERE p_id= ? ORDER BY datetime DESC";
  $comments = DB::select($sql, array($id));
  return $comments;
}

//Function to get a specific post
function get_Post($id){
	$sql = "SELECT * FROM posts WHERE id = ?";
	$post = DB::select($sql, array($id));
	return $post;
}

//Function to add Post to the database
function add_post($title, $msg, $name) 
{
  
  if(!empty($title) && !empty($msg) && !empty($name))
  {
    $sql = "insert into posts (title, message, user, datetime, profile) values (?, ?, ?,CURRENT_TIMESTAMP, '../public/images/profile.png')";
    DB::insert($sql, array($title, $msg, $name));
    $id = DB::getPdo()->lastInsertId();
    return $id;
  } else 
    return false;
  {
    
  }
  
}

//Function to add a comment to a post (database)
function add_comment($msg, $name, $id) 
{
  if(!empty($msg) && !empty($name) && !empty($id))
  {
  $sql = "insert into comments (message, user, datetime, p_id) values (?, ?,CURRENT_TIMESTAMP, ?)";
  DB::insert($sql, array($msg, $name, $id));
  $didins = DB::getPdo()->lastInsertId();
  return $didins;
  } else {
    return false;
  }
}

//Function to update an edited post
function update_post($id, $title, $msg, $name)
{
   if(!empty($title) && !empty($msg) && !empty($name))
  {
  $sql = "update posts set title = ?, message = ?, user = ? where id = ?";
  DB::update($sql, array($title, $msg, $name, $id));
  return true;
  } else {
    return false;
  }
}

//Function to delete post (and corresponding comments) from database
function delete_post($id)
{
  $sql = "delete from posts where id = ?";
  DB::delete($sql, array($id));
  
  $sql2 = "DELETE FROM comments WHERE p_id = ?";
  DB::delete($sql2, array($id));  
}

//Function to delete comment from database
function delete_comment($id)
{
  $sql = "delete from comments where c_id = ?";
  DB::delete($sql, array($id));
}