<?php



class FriendsUser extends Eloquent {
    
    
    
    
    
    
        public function scopeFriends($query, $isf)
    {
        return $query->whereUser_id($isf);
    }
    
        public function scopeIsfriend($query, $id)
    {
        return $query->whereFriend_id($id);
    }
}