<?php

class PostsTableSeeder extends Seeder {
    

    
    public function run(){
        
        $post = new Post;
        $post->title = 'Im so Rich';
        $post->message = 'title says it all :P';
        $post->user_id = '4';
        $post->privacy_level = 'Public';
        $post->save();
        
        $post = new Post;
        $post->title = 'Yum!';
        $post->message = 'Off to a parlimentary hotdog eating contest!';
        $post->user_id = '4';
        $post->privacy_level = 'Friends';
        $post->save();
        
        $post = new Post;
        $post->title = 'Why?';
        $post->message = 'Why dont\'t you people want free health care? ';
        $post->user_id = '3';
        $post->privacy_level = 'Public';
        $post->save();
        
        $post = new Post;
        $post->title = 'Im still here';
        $post->message = 'What has my party become?';
        $post->user_id = '2';
        $post->privacy_level = 'Private';
        $post->save();
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}