<?php


class EmployeePositionModel extends Dbh{

    public function getAllPositions(){
        try{

            $stmt = $this->connect()->prepare("SELECT * FROM employee_position WHERE isRemove != 1");

            if(!$stmt->execute()){
                return false;
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        }catch(PDOException $e){
            print("ERROR: ". $e->getMessage());
            exit();
        }finally{
            $stmt = null;
        }
    }

    
    public function insertPosition($job_pos){
        try{
            $stmt = $this->connect()->prepare("INSERT INTO employee_position (position_name) VALUES (?)");

            if(!$stmt->execute([$job_pos])){
                return false;
                exit();
            }

            return true;

        }catch(PDOException $e){
            print ("error". $e->getMessage() ."");
        }finally{
            $stmt = null;
        }
    }

    
    public function updatePosition($job_pos, $id){
        try{
            $stmt = $this->connect()->prepare("UPDATE employee_position SET position_name = ? WHERE id = ?");

            if(!$stmt->execute([$job_pos, $id])){
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

    public function deletePosition($id){
        try{
            $stmt = $this->connect()->prepare("UPDATE employee_position SET isRemove = 1 WHERE id = ?");

            if(!$stmt->execute([$id])){
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


    public function archivePosition($archive_value, $id){
        try{
            $stmt = $this->connect()->prepare("UPDATE employee_position SET isArchive = ? WHERE id = ?");

            if(!$stmt->execute([$archive_value, $id])){
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