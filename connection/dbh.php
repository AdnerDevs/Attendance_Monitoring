<?php 

class Dbh {
   protected function connect(){
        try{
            $user = 'root';
            $password = '';
            $db = new PDO('mysql:host=localhost;dbname=attendance', $user, $password);

            return $db;
        }catch(PDOException $e){
            print ('error: ' . $e->getMessage());
            die();
        }
        
   }
}