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

/* Load sample data, an array of associative arrays. */
require "models/library.php";


// Display search form
Route::get('/', function()
{
	return View::make('Library.query');
});

// Perform search and display results
Route::get('search', function()
{
	$query = Input::get('qsearch');
	$results = search($query);
	return View::make('Library.results')->withLib($results)->withQuery($query);
});




/* Search sample data for $query from form. */
function search($query) {

	if (!empty($query)) {
		$sql = "select * from pms where name like ?";
    	$pms = DB::select($sql, array("%$query%"));
    
	} else {
		$sql = "select * from pms";
		$pms = DB::select($sql);
	}
    return $pms;
}