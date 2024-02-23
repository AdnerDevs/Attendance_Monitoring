<?php

class AttendanceModel extends Dbh{

    public function getAllAttendanceData(){
        try{
            $stmt = $this->connect()->prepare("SELECT ea.employee_attendance_id, ea.employee_id, ea.employee_name, ac.activity_type, ea.activity_description, ea.start_time, ea.end_time, ea.total_time, ea.submitted_by, ea.submitted_on, dp.department_name  FROM employee_attendance ea 
            INNER JOIN activity ac ON ea.activity_type = ac.activity_id 
            INNER JOIN department dp ON ea.department_id = dp.department_id 
            ORDER BY employee_attendance_id ASC");

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


    public function insertAttendance($employee_id, $employee_name, $dept_id, $act_type, $activity_description, $start_time, $end_time, $diff_in_hours, $submitted_by, $submitted_on){
        try{
            $stmt = $this->connect()->prepare
            ('INSERT INTO employee_attendance 
            (employee_id, employee_name, department_id, activity_type, activity_description, start_time, end_time, total_time, submitted_by, submitted_on)
            VALUES (?,?,?,?,?,?,?,?,?,?)
            ');

            if(!$stmt->execute([$employee_id, $employee_name, $dept_id, $act_type, $activity_description, $start_time, $end_time, $diff_in_hours, $submitted_by, $submitted_on])){
                return false;
            }

            return true;

        }catch(PDOException $e){
            print('error' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }
}