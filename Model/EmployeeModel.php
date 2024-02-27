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

    public function registerEmployee( $employee_id, $employee_name, $nickname, $department_id, $id_credentials, $surname_credentials,$usertpye ){
        try{
            $stmt = $this->connect()->prepare("INSERT INTO employee_user (employee_id, employee_name, nickname, department_id) VALUES(?,?,?,?)");

            if(!$stmt->execute([ $employee_id, $employee_name, $nickname, $department_id  ])){
                return false;
                die();
            }

            $this->createLoginCredentials($employee_id, $id_credentials, $surname_credentials, $usertpye);
            
            return true;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }

    public function createLoginCredentials($employee_id, $id_credentials, $surname_credentials, $usertpye ){
        try{

            $stm = $this->connect()->prepare('INSERT INTO login_credentials (employee_id, credential_id, credential_surname, user_type) VALUES (?,?,?,?)');

            if(!$stm->execute([$employee_id, $id_credentials, $surname_credentials, $usertpye])){
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