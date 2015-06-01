<?php

class CommentsTableSeeder extends Seeder {
    

    
    public function run(){
        
        $comment = new Comment;
        $comment->message = 'I can\'t believe you\'re a minister of my crown...';
        $comment->user_id = '1';
        $comment->post_id = '1';
        $comment->save();
        
      
        $comment = new Comment;
        $comment->message = 'Enjoy it while you can...';
        $comment->user_id = '2';
        $comment->post_id = '1';
        $comment->save();
        
        $comment = new Comment;
        $comment->message = 'You\'re not selling it right.';
        $comment->user_id = '2';
        $comment->post_id = '3';
        $comment->save();
        
        $comment = new Comment;
        $comment->message = 'Send some to the U.S treasury plz?';
        $comment->user_id = '3';
        $comment->post_id = '1';
        $comment->save();
        
        
        
    }
}
    
    