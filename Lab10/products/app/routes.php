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
Route::resource('product','ProductController');
Route::resource('user','UserController');


Route::get('/',array('as'=>'home','uses'=>'ProductController@index'));






