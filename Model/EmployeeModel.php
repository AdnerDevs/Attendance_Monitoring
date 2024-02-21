<?php


class EmployeeModel extends Dbh{


    public function getAllEmployees(){
        try{
            $stmt = $this->connect()->prepare("SELECT eu.employee_id, eu.employee_name, eu.nickname, eu.status, dp.department_name, eu.created_time FROM employee_user eu INNER JOIN department dp ON eu.department_id = dp.department_id ORDER BY employee_id ASC");

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

    public function registerEmployee( $employee_id, $employee_name, $nickname, $department_id, $id_credentials, $surname_credentials ){
        try{
            $stmt = $this->connect()->prepare("INSERT INTO employee_user (employee_id, employee_name, nickname, department_id) VALUES(?,?,?,?)");

            if(!$stmt->execute([ $employee_id, $employee_name, $nickname, $department_id  ])){
                return false;
                die();
            }

            $this->createLoginCredentials($employee_id, $id_credentials, $surname_credentials);
            
            return true;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }

    public function createLoginCredentials($employee_id, $id_credentials, $surname_credentials ){
        try{

            $stm = $this->connect()->prepare('INSERT INTO login_credentials (employee_id, credential_id, credential_surname) VALUES (?,?,?)');

            if(!$stm->execute([$employee_id, $id_credentials, $surname_credentials])){
                return false;
            }

            return true;

        }catch(PDOException $e){
            print('' .$e->getMessage());
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
            $stmt = $this->connect()->prepare("SELECT * FROM login_credentials WHERE credential_id = ? AND credential_surname = ?");

            if(!$stmt->execute(array($employee_id, $employee_name))){
                return false;
                exit();
            }
            session_start();

            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            $id = $userData["employee_id"];

            if($userData["credential_id"] != $employee_id){
                return false;
                exit();
            }

            $stmt2 = $this->connect()->prepare('SELECT * FROM employee_user WHERE employee_id = ? AND isRemove != 1');

            if(!$stmt2->execute([$id])){
                return false;
                exit();
            }
      
            $stmt3 = $this->connect()->prepare("UPDATE employee_user SET status = 1 WHERE employee_id = ?");
            $stmt3->execute([$id]);

            $userData2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            $id2 = $userData2["employee_id"];
            if($userData2["employee_id"] != $id2){
                return false;
                exit();
            }

            $_SESSION['employee_id'] = $userData2['employee_id'];
            $_SESSION['employee_name'] = $userData2['employee_name'];

            return true;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
            exit();
        }finally{
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
        }
    }

    public function employeeData($employee_id){
        try{
            $stmt = $this->connect()->prepare('SELECT * FROM employee_user WHERE employee_id = ? AND isRemove != 1');

            if(!$stmt->execute([$employee_id])){
                return false;
                exit();
            }

            session_start();
      
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
            print('Error: ' .$e->getMessage());
            exit();
        }finally{
            $stmt = null;
            $stmt2 = null;

        }
    }

    public function logoutEmployee($employee_id){
        try{
            $stmt = $this->connect()->prepare('UPDATE employee_user SET status = 0 WHERE employee_id = ? ');

            if(!$stmt->execute([ $employee_id ])){
                return false;
                exit();
            }

            return true;
        }catch(PDOException $e){
            print('erorr:' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }
}