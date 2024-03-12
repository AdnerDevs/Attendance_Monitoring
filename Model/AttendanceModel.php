<?php

class AttendanceModel extends Dbh{

    // GET

    public function fetch(){
        try{
            $data = [];
            $stmt = $this->connect()->prepare("SELECT ea.employee_attendance_id, ea.employee_id, ea.employee_name, ac.activity_type, ea.activity_description, ea.start_time, ea.end_time, ea.total_time, ea.submitted_by, ea.submitted_on, dp.department_name, ea.day,  ea.hour, ea.minute, ea.second, lc.credential_id, ea.day, ea.hour, ea.minute, ea.second 
            FROM employee_attendance ea 
            INNER JOIN activity ac ON ea.activity_type = ac.activity_id 
            INNER JOIN department dp ON ea.department_id = dp.department_id
            INNER JOIN login_credentials lc ON ea.employee_id = lc.employee_id 
            ORDER BY ea.employee_attendance_id DESC");

            if(!$stmt->execute()){
                return false;
           
            }

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }
    public function date_range($start_date, $end_date) {
        try {
            $data = [];
            if(isset($start_date) && isset($end_date)) {
                $stmt = $this->connect()->prepare("SELECT ea.employee_attendance_id, ea.employee_id, ea.employee_name, ac.activity_type, ea.activity_description, ea.start_time, ea.end_time, ea.total_time, ea.submitted_by, ea.submitted_on, dp.department_name, ea.day,  ea.hour, ea.minute, ea.second, lc.credential_id, ea.day, ea.hour, ea.minute, ea.second 
                    FROM employee_attendance ea 
                    INNER JOIN activity ac ON ea.activity_type = ac.activity_id 
                    INNER JOIN department dp ON ea.department_id = dp.department_id
                    INNER JOIN login_credentials lc ON ea.employee_id = lc.employee_id
                    WHERE DATE(ea.start_time) >= ? AND DATE(ea.start_time) <= ?
                    ORDER BY ea.employee_attendance_id DESC");
    
                if(!$stmt->execute([$start_date, $end_date])) {
                    return false;
                }
    
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return $data;
        } catch(PDOException $e) {
            // Print error message or log it
            print('Error: ' . $e->getMessage());
            return false;
        }
    }
    
    public function getAllAttendanceData(){
        try{
            $stmt = $this->connect()->prepare("SELECT ea.employee_attendance_id, ea.employee_id, ea.employee_name, ac.activity_type, ea.activity_description, ea.start_time, ea.end_time, ea.total_time, ea.submitted_by, ea.submitted_on, dp.department_name, ea.day,  ea.hour, ea.minute, ea.second, lc.credential_id 
            FROM employee_attendance ea 
            INNER JOIN activity ac ON ea.activity_type = ac.activity_id 
            INNER JOIN department dp ON ea.department_id = dp.department_id
            INNER JOIN login_credentials lc ON ea.employee_id = lc.employee_id 
            ORDER BY ea.employee_attendance_id DESC");

            if(!$stmt->execute()){
                return false;
           
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }

    public function getData($employee_id, $activity_type){
        try{

            $stmt = $this->connect()->prepare('SELECT * FROM employee_attendance WHERE employee_id = ? AND activity_type = ? AND DATE(start_time) = CURDATE()');

            if(!$stmt->execute([$employee_id, $activity_type])){
                return false;
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            echo 'Error inserting attendance: ' . $e->getMessage();
            return false;
        } finally {
            $stmt = null;
        }
    }
    
    public function getEmployeeData($employee_id){
        try{

            $stmt = $this->connect()->prepare('SELECT ea.employee_name, ea.start_time, ea.end_time, ac.activity_type FROM employee_attendance ea
            INNER JOIN activity ac ON ea.activity_type = ac.activity_id
            WHERE employee_id = ? ORDER BY start_time DESC');
            if(!$stmt->execute([$employee_id])){
                return false;
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (PDOException $e) {
            echo 'Error inserting attendance: ' . $e->getMessage();
            return false;
        } finally {
            $stmt = null;
        }
    }

    // INSERT

    public function insertAttendance($employee_id, $employee_name, $department_id, $activity_type, $activity_description, $start_time, $submitted_by, $submitted_on){
        try {
            $stmt = $this->connect()->prepare('INSERT INTO employee_attendance (employee_id, employee_name, department_id, activity_type, activity_description, start_time, submitted_by, submitted_on) VALUES (?,?,?,?,?,?,?,?)');
    
            if (!$stmt->execute([$employee_id, $employee_name, $department_id, $activity_type, $activity_description, $start_time, $submitted_by, $submitted_on])) {
                return false;
            }
    
            // Retrieve the last inserted ID
            $lastInsertedId = $this->connect()->lastInsertId();
    
            // Alternatively, you can fetch the inserted record
            $stmt2 = $this->connect()->prepare('SELECT * FROM employee_attendance WHERE employee_attendance_id = ?');
            if(!$stmt2->execute([$lastInsertedId])){
                return false;
            }
            $result = $stmt2->fetch(PDO::FETCH_ASSOC);
            return $result ;
    
        } catch (PDOException $e) {
            echo 'Error inserting attendance: ' . $e->getMessage();
            return false;
        } finally {
            $stmt = null;
        }
    }
    


    // UPDATE
    public function updateEndtimeAttendance($end_time, $toal_time, $day, $hour, $minute, $second, $employee_id, $activity_type,  $employee_attendance_id){
        try{

            $stmt = $this->connect()->prepare('UPDATE employee_attendance SET end_time = ?,`total_time` = ?, `day` = ?, `hour` = ?, `minute` = ?, `second` = ?, `submitted_on`=? WHERE employee_id = ? AND activity_type = ? AND employee_attendance_id = ?');

            if(!$stmt->execute([ $end_time, $toal_time, $day, $hour, $minute, $second , $end_time, $employee_id, $activity_type,  $employee_attendance_id])){
                return false;
            }

            return true;

        } catch (PDOException $e) {
            echo 'Error inserting attendance: ' . $e->getMessage();
            return false;
        } finally {
            $stmt = null;
        }
    }


 


    
}