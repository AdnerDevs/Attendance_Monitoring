<?php

class EmployeeModel extends Dbh{

    public function getAllEmployees(){
        try{
            $stmt = $this->connect()->prepare("SELECT *  FROM employee_user ORDER BY employee_id ASC");

            if(!$stmt->execute()){
                return false;
                die();
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }
}