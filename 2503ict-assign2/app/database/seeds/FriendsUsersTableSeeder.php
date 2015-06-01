<?php

class FriendsUsersTableSeeder extends Seeder {
    

    
    public function run(){
        
     $friends = new FriendsUser;
     $friends->friend_id = 2;
     $friends->user_id = 1 ;
     $friends->save();
        
     $friends = new FriendsUser;
     $friends->friend_id = 3;
     $friends->user_id = 1;
     $friends->save();
        
     $friends = new FriendsUser;
     $friends->friend_id = 4;
     $friends->user_id = 1;
     $friends->save();
        
     $friends = new FriendsUser;
     $friends->friend_id = 3 ;
     $friends->user_id = 2;
     $friends->save();

     $friends = new FriendsUser;
     $friends->friend_id = 4 ;
     $friends->user_id = 2;
     $friends->save();
     
     $friends = new FriendsUser;
     $friends->friend_id = 4 ;
     $friends->user_id = 3;
     $friends->save();
        
        
        
    }
}
    