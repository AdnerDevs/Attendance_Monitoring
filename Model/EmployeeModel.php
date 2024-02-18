<?php
session_start();

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

    public function registerEmployee( $employee_id, $employee_name ){
        try{
            $stmt = $this->connect()->prepare("INSERT INTO employee_user (employee_id, employee_name) VALUES(?,?)");

            if(!$stmt->execute([ $employee_id, $employee_name ])){
                return false;
                die();
            }

            return true;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }

    public function checkID($emp_id){
        try{
            $stmt = $this->connect()->prepare('SELECT employee_id FROM employee_user WHERE employee_id = ? AND isRemove != 1');
            $stmt->execute([$emp_id]);
            
            $result = ($stmt->rowCount()>0) ? false : true;
            return $result;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
            return false;
        }finally{
            $stmt = null;
        }
    }

    public function loginUser($employee_id, $employee_name ){
        try{
            $stmt = $this->connect()->prepare("SELECT * FROM employee_user WHERE employee_id = ? AND employee_name = ?");

            if(!$stmt->execute(array($employee_id,$employee_name))){
                return false;
                exit();
            }

            $stmt2 = $this->connect()->prepare("UPDATE employee_user SET status = 1 WHERE employee_id = ?");
            $stmt2->execute([$employee_id]);

            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            if($userData["employee_id"] != $employee_id){
                return false;
                exit();
            }

            $_SESSION['employee_id'] = $userData['employee_id'];
            $_SESSION['employee_name'] = $userData['employee_name'];
            return true;

        }catch(PDOException $e){
          
            exit();
        }finally{
            $stmt = null;
            $stmt2 = null;
        }
    }
}