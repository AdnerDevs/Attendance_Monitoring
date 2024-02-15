<?php

class ActivityModel extends Dbh {

    public function getAllActivity(){
        try{
            $stmt = $this->connect()->prepare("SELECT * FROM activity ORDER BY activity_id ASC");

            if(!$stmt->execute()){
                return false;
                die();              
            }
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        }catch(PDOException $e){
            print ("error: " . $e->getMessage() ."");
        }finally{
            $stmt = null;
        }
    }

    public function insertActivityType($activity_type, $current_date){
        try{
            $stmt = $this->connect()->prepare("INSERT INTO activity (activity_type, activity_created_time) VALUES (?,?)");

            if(!$stmt->execute([$activity_type, $current_date])){
                return false;
                die();
            }

            return true;

        }catch(PDOException $e){
            print ("error". $e->getMessage() ."");
        }finally{
            $stmt = null;
        }
    }
}