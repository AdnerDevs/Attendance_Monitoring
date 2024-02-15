<?php

class AttendanceModel extends Dbh{

    public function getAllAttendanceData(){
        try{
            $stmt = $this->connect()->prepare("SELECT * FROM employee_attendance ORDER BY employee_attendance_id ASC");

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