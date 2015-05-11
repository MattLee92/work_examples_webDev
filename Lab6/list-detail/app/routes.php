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

Route::get('/', function()
{
	return View::make('hello');
});



/* Displays item with the given id. */
Route::get('item_detail/{id}', function ($id)
{
  $item = get_item($id);
	return View::make('items.item_detail')->withItem($item);
}); 

Route::get('add_item', function()
{
  return View::make('items.add_item');
});

Route::post('add_item_action', function()
{
  $summary = Input::get('summary');
  $details = Input::get('details');

  $id = add_item($summary, $details);

  // If successfully created then display newly created item
  if ($id) 
  {
    return Redirect::to(url("item_detail/$id"));
  } 
  else
  {
    die("Error adding item");
  }
});

Route::get('update_item/{id}', function($id)
{
  $item = get_item($id);
  return View::make('items.update_item')->withItem($item);

});

Route::post('update_item_action', function()
{
  $id = Input::get('id');
  $summary = Input::get('summary');
  $details = Input::get('details');
  
   update_item($id, $summary, $details);

    return Redirect::to(url("item_detail/$id"));
    
});

Route::get('delete_item_action/{id}', function($id)
{
  
  delete_item($id);
  return Redirect::to(url("item_list"));
  
});

function get_items()
{
  $sql = "select * from item";
  $posts = DB::select($sql);;
  return $posts;
}

function get_comment_count($id)
{
  $sql = "SELECT COUNT(*) AS count FROM comments WHERE p_id = ?";
  $count = DB::select($sql,array($id));
  return $count;
}
/* Gets item with the given id */
function get_item($id)
{
	$sql = "select id, summary, details from item where id = ?";
	$items = DB::select($sql, array($id));

	// If we get more than one item or no items display an error
	if (count($items) != 1) 
	{
    die("Invalid query or result: $query\n");
  }

	// Extract the first item (which should be the only item)
  $item = $items[0];
	return $item;
}

function add_item($summary, $details) 
{
  $sql = "insert into item (summary, details) values (?, ?)";

  DB::insert($sql, array($summary, $details));

  $id = DB::getPdo()->lastInsertId();

  return $id;
}

function update_item($id, $summary, $details)
{
  $sql = "update item set summary = ?, details = ? where id = ?";
  DB::update($sql, array($summary,$details,$id));
  
}

function delete_item($id)
{
  $sql = "delete from item where id = ?";
  DB::delete($sql, array($id));
  
}