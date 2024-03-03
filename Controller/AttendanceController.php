<?php
date_default_timezone_set('Asia/Manila');
$currentDateTime = new DateTime('now');
$current_date = $currentDateTime->format('Y-m-d H:i:s');
header('Content-Type: application/json');
require_once ('../connection/dbh.php');
require_once ('../Model/AttendanceModel.php');

$attendance_model = new AttendanceModel();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['employee_id']) && isset($_POST['employee_name']) && isset($_POST['credential_id']) && isset($_POST['department_id'])){
        $employee_id = htmlspecialchars($_POST['employee_id'], ENT_QUOTES, 'UTF-8');
        $submitted_by = htmlspecialchars($_POST['credential_id'], ENT_QUOTES, 'UTF-8');
        $employee_name = htmlspecialchars($_POST['employee_name'], ENT_QUOTES, 'UTF-8');
        $department_id = htmlspecialchars($_POST['department_id'], ENT_QUOTES, 'UTF-8');
        $activity_type = 1;
        $activity_description = 'Attendance';
        $start_time  = $current_date;


        $insert_attendance = $attendance_model->insertAttendance($employee_id, $employee_name, $department_id, $activity_type, $activity_description, $start_time, $submitted_by, $start_time);

        if($insert_attendance != false){
                echo json_encode(['status' => 'success']);
        }else{
                echo json_encode(['status' => 'failed']);
        }


    }

    if(isset($_POST['employee_id']) && isset($_POST['total_seconds'])){
        $employee_id = htmlspecialchars($_POST['employee_id'], ENT_QUOTES, 'UTF-8');
        $total_seconds = intval($_POST['total_seconds']);

        $activity_type = 1;



        $day = floor($total_seconds / (60 * 60 * 24));
        $totalSeconds -= $day * (60 * 60 * 24);
        $hour= floor($total_seconds / (60 * 60));
        $totalSeconds -= $hour * (60 * 60);
        $minute = floor($total_seconds / 60);
        $totalSeconds -= $minute * 60;
        $second = $total_seconds;
        $end_time = $current_date;

        $update_end_attendance = $attendance_model->updateEndtimeAttendance($total_seconds, $end_time, $day, $hour, $minute, $second, $employee_id, $activity_type);


        if($update_end_attendance != false){
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'failed']);
        }
    }

}
