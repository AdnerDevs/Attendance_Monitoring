<?php

class ActivityModel extends Dbh {

    public function getAllActivity(){
        try{
            $stmt = $this->connect()->prepare("SELECT * FROM activity WHERE isDeleted != 1 ORDER BY activity_id ASC");

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

    public function getAllActivityDisplay(){
        try{
            $stmt = $this->connect()->prepare("SELECT * FROM activity WHERE isDeleted != 1 AND isArchive != 1 ORDER BY activity_id ASC");

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


    public function updateActivityType($activity_type, $current_date, $activity_id){
        try{
            $stmt = $this->connect()->prepare("UPDATE activity SET activity_type = ?, activity_edited_time = ? WHERE activity_id = ?");

            if(!$stmt->execute([$activity_type, $current_date, $activity_id])){
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

    public function deleteActivityType($activity_id){
        try{
            $stmt = $this->connect()->prepare("UPDATE activity SET isDeleted = 1 WHERE activity_id = ?");

            if(!$stmt->execute([$activity_id])){
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

    public function archiveActivityType($activity_id){
        try{
            $stmt = $this->connect()->prepare("UPDATE activity SET isArchive = 1 WHERE activity_id = ?");

            if(!$stmt->execute([$activity_id])){
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

    public function unarchiveActivityType($activity_id){
        try{
            $stmt = $this->connect()->prepare("UPDATE activity SET isArchive = 0 WHERE activity_id = ?");

            if(!$stmt->execute([$activity_id])){
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