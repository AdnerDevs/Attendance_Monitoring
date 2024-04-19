<?php


class EmployeeModel extends Dbh
{


    public function getAllEmployees()
    {
        try {
            $stmt = $this->connect()->prepare("SELECT eu.employee_id, eu.employee_name, eu.department_id, eu.position_id, eu.status, dp.department_name, eu.created_time, ep.position_name FROM employee_user eu INNER JOIN department dp ON eu.department_id = dp.department_id
            INNER JOIN employee_position ep ON eu.position_id = ep.id WHERE eu.isRemove != 1 ORDER BY eu.employee_id ASC");

            if (!$stmt->execute()) {
                return false;
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            print ('Error: ' . $e->getMessage());
        } finally {
            $stmt = null;
        }
    }

    public function registerEmployee($employee_id, $employee_name, $department_id, $position_id, $usertpye)
    {
        try {
            $stmt = $this->connect()->prepare("INSERT INTO employee_user (employee_id, employee_name, department_id, position_id) VALUES(?,?,?,?)");

            if (!$stmt->execute([$employee_id, $employee_name, $department_id, $position_id])) {
                return false;
            }

            $this->createLoginCredentials($employee_id, $employee_id, $usertpye);

            return true;
        } catch (PDOException $e) {
            print ('Error: ' . $e->getMessage());
        } finally {
            $stmt = null;
        }
    }

    public function createLoginCredentials($employee_id, $id_credentials, $usertpye)
    {
        try {

            $stmt = $this->connect()->prepare('INSERT INTO login_credentials (employee_id, credential_id, user_type) VALUES (?,?,?)');

            if (!$stmt->execute([$employee_id, $id_credentials, $usertpye])) {
                return false;
            }

            return true;
        } catch (PDOException $e) {
            print ('' . $e->getMessage());
        } finally {
            $stmt = null;
        }
    }

    public function checkID($emp_id)
    {
        try {
            $stmt = $this->connect()->prepare('SELECT * FROM employee_user WHERE employee_id = ? AND isRemove != 1');
            $stmt->execute([$emp_id]);

            $result = ($stmt->rowCount() > 0) ? false : true;
            return $result;
        } catch (PDOException $e) {
            print ('Error: ' . $e->getMessage());
            return false;
        } finally {
            $stmt = null;
        }
    }

    // update

    public function updateEmployee( $employee_name, $department_id, $position_id, $employee_id_old){
        try {

            $stmt = $this->connect()->prepare('UPDATE employee_user SET employee_name = ?, department_id = ?, position_id = ?  WHERE employee_id = ?');

            if(!$stmt->execute([ $employee_name, $department_id, $position_id, $employee_id_old])){
                return false;
            }
            return true;
        } catch (PDOException $e) {
            print ('erorr:' . $e->getMessage());
        } finally {
            $stmt = null;
        }
    }

    public function updateEmployeeID( $employee_name, $department_id, $position_id, $employee_id_old,  $employee_id_new){
        try {

            $stmt = $this->connect()->prepare('UPDATE employee_user SET employee_name = ?, department_id = ?, position_id = ?, employee_id = ?  WHERE employee_id = ?');

            if(!$stmt->execute([ $employee_name, $department_id, $position_id, $employee_id_new, $employee_id_old])){
                return false;
            }

            $perform = $this->updateLoginCredentialsID($employee_id_old, $employee_id_new);

            if( $perform  != false){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            print ('erorr:' . $e->getMessage());
        } finally {
            $stmt = null;
        }
    }

    public function updateLoginCredentialsID($employee_id_old, $employee_id_new){
        try{

            $stmt = $this->connect()->prepare('UPDATE login_credentials SET employee_id = ?, credential_id = ? WHERE employee_id = ?');

            if(!$stmt->execute([$employee_id_new, $employee_id_new, $employee_id_old])){
                return false;
            }

            return true;

        }catch(PDOException $e){
            print('' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }

    public function removeEmployee($employee_id)
    {
        try {

            $stmt = $this->connect()->prepare('UPDATE employee_user set isRemove = 1 WHERE employee_id = ?');


            if ($stmt->execute([$employee_id])) {
                $update = $this->updateLogincredentials($employee_id);
                if ($update) {
                    return $update;
                } else {
                    return false;
                }
            }

            return false;
        } catch (PDOException $e) {
            print ('erorr:' . $e->getMessage());
        } finally {
            $stmt = null;
        }
    }

    public function updateLogincredentials($employee_id)
    {
        try {

            $stmt = $this->connect()->prepare('UPDATE login_credentials set isRemove = 1 WHERE employee_id = ?');

            if ($stmt->execute([$employee_id])) {

                return true;

            }
            return false;
        } catch (PDOException $e) {
            print ('erorr:' . $e->getMessage());
        } finally {
            $stmt = null;

        }
    }

    public function logoutEmployee($employee_id)
    {
        try {
            $stmt = $this->connect()->prepare('UPDATE employee_user SET status = 0 WHERE employee_id = ? ');

            if (!$stmt->execute([$employee_id])) {
                return false;
                exit();
            }

            return true;
        } catch (PDOException $e) {
            print ('erorr:' . $e->getMessage());
        } finally {
            $stmt = null;
        }
    }
}
