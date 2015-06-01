<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class User extends Eloquent implements UserInterface, RemindableInterface, StaplerableInterface {

	use UserTrait, RemindableTrait, EloquentTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	public function users()
	{
		return $this->belongsToMany('User', 'friends_users', 'id','friend_id');
	}
	
	public function posts()
	{
		return $this->hasMany('Post', 'user_id', 'id');
	}
	
	public function scopeSearchUser($query, $sr)
	{
		return $query->whereFullname($sr);
	}

	public static $rules = array(
        
        'email' => 'required|unique:users',
        'name' => 'required',
        'password' => 'required|min:5|same:passwordcon',
      
        
    );
    public static $rulesUpdate = array(
        
        'name' => 'required',
        'password' => 'required|min:5|same:passwordcon',
      
        
    );
 public function __construct(array $attributes = array()) {
 $this->hasAttachedFile('image', [
 'styles' => [
 'medium' => '300x300',
 'thumb' => '100x100'
 ]
 ]);
 parent::__construct($attributes);
 }
}
