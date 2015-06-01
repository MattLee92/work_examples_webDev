<?php



class Post extends Eloquent {
    
    public function users()
    {
        return $this->belongsTo('User');
    }
    
    public function comments()
	{
		return $this->hasMany('Comment', 'post_id','id');
	}

    public function scopeSearchPost($query, $sr)
	{
		return $query->whereId($sr);
	}
    public static $rules = array(
        
        'message' => 'required',
        'title' => 'required'

    );
}