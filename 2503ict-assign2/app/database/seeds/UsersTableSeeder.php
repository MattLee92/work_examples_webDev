<?php




class UsersTableSeeder extends Seeder {
    
    
    
    
    
    public function run(){
      
        $user = new User;
        $user->email = 'windsor@royal.gov.uk';
        $user->password = Hash::make('corgie');
        $user->fullname = 'Queen Elizabeth II'; 
        $user->dob = '21/05/1914';
        $user->save();
        
        $user = new User;
        $user->email = 'johnh@lowerhouse.gov.au';
        $user->password = Hash::make('neverCostello');
        $user->fullname = 'John Howard'; 
        $user->dob = '25/04/1934';
        $user->save();
        
        $user = new User;
        $user->email = 'obama@whitehouse.gov';
        $user->password = Hash::make('obamacare');
        $user->fullname = '06/09/1936'; 
        $user->dob = '25/07/76';
        $user->save();
        
        $user = new User;
        $user->email = '$$$@tycoon.com.au';
        $user->password = Hash::make('dinosaurIsland');
        $user->fullname = 'Clive Palmer'; 
        $user->dob = '01/07/1943';
        $user->save();
        
    
        
    }
    
    
}