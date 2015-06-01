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

Route::post('user/login', array('as' => 'user.login', 'uses' =>'UserController@login'));

Route::get('user/logout', array('as' => 'user.logout', 'uses' =>'UserController@logout'));

Route::post('user/search', array('as' => 'user.search', 'uses' =>'UserController@search'));

Route::get('post/doc', array('as' => 'post.doc', 'uses' =>'PostController@doc'));


Route::resource('user', 'UserController');

Route::resource('post', 'PostController');

Route::resource('comment', 'CommentController');

Route::resource('friend', 'FriendsUserController');

Route::get('/',array('as'=>'home','uses'=>'PostController@index'));

Route::get('/users/usercreate',array('as'=>'userCreate','uses'=>'UserController@index'));

