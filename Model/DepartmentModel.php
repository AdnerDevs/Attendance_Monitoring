<?php


class DepartmentModel extends Dbh{

    public function getAllDepartment(){
        try{

            $stmt = $this->connect()->prepare("SELECT * FROM department WHERE isDeleted != 1");

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

    
    public function insertDepartment($dept_name){
        try{
            $stmt = $this->connect()->prepare("INSERT INTO department (department_name) VALUES (?)");

            if(!$stmt->execute([$dept_name])){
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

    
    public function updateDepartment($dept_name, $dept_id){
        try{
            $stmt = $this->connect()->prepare("UPDATE department SET department_name = ? WHERE department_id = ?");

            if(!$stmt->execute([$dept_name, $dept_id])){
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

    public function deleteDepartment($delete_value, $dept_id){
        try{
            $stmt = $this->connect()->prepare("UPDATE department SET isDeleted = ? WHERE department_id = ?");

            if(!$stmt->execute([$delete_value, $dept_id])){
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


    public function archiveDepartment($archive_value, $dept_id){
        try{
            $stmt = $this->connect()->prepare("UPDATE department SET isArchive = ? WHERE department_id = ?");

            if(!$stmt->execute([$archive_value, $dept_id])){
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