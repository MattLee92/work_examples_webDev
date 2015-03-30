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


require 'models/posts.php';
require 'models/friends.php';

Route::get('/', function()
{
    $retpost = getP();
    
	return View::make('social.home')->withPosts($retpost);
});

Route::get('friends',function()
{
   
   $retfriends = getFriends();
   return View::make('social.friends')->withFriends($retfriends);
   
});


function getP(){
    
    $posts = getPosts();
    $Rposts = array();
    $Rnumber = rand(1,count($posts));
     for ($i=0; $i < $Rnumber; $i++){
         $rposts[]=$posts[$i];
     }
     $posts = $rposts;
     
    return $posts;
    
    
}