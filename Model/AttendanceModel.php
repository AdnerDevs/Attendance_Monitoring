<?php

class AttendanceModel extends Dbh{

    public function getAllAttendanceData(){
        try{
            $stmt = $this->connect()->prepare("SELECT ea.employee_attendance_id, ea.employee_id, ea.employee_name, ac.activity_type, ea.activity_description, ea.start_time, ea.end_time, ea.total_time, ea.submitted_by, ea.submitted_in  FROM employee_attendance ea INNER JOIN activity ac ON ea.activity_type = ac.activity_id ORDER BY employee_attendance_id ASC");

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