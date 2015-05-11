<?php

class Product extends Eloquent {
    
    
    public static $rules = array(
        
        'name' => 'required|min:5',
        'price' => 'required'
        
        );
    
    
    
    
    
    
}