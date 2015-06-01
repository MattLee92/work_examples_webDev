<?php



class Comment extends Eloquent {
    
    public function posts()
	{
		return $this->belongsTo('Post');
	}
	
	public function scopeCommentsForPost($query, $id)
	{
		return $query->wherePost_id($id);
	}
	
	public static $rules = array(
        
        'message' => 'required'

    );
	

}