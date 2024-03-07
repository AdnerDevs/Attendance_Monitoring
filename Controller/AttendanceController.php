<?php
date_default_timezone_set('Asia/Manila');
$currentDateTime = new DateTime('now');

$current_date = $currentDateTime->format('Y-m-d H:i:s');

header('Content-Type: application/json');
require_once ('../connection/dbh.php');
require_once ('../Model/AttendanceModel.php');

$attendance_model = new AttendanceModel();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // if(isset($_POST['employee_id']) && isset($_POST['employee_name']) && isset($_POST['credential_id']) && isset($_POST['department_id']) && isset($_POST['activity_description']) && isset($_POST['activity_type'])){
    //     $employee_id = htmlspecialchars($_POST['employee_id'], ENT_QUOTES, 'UTF-8');
    //     $submitted_by = htmlspecialchars($_POST['credential_id'], ENT_QUOTES, 'UTF-8');
    //     $employee_name = htmlspecialchars($_POST['employee_name'], ENT_QUOTES, 'UTF-8');
    //     $department_id = htmlspecialchars($_POST['department_id'], ENT_QUOTES, 'UTF-8');
    //     $activity_type = 1;
    //     $activity_description = 'Attendance';
    //     $start_time  = $current_date;


    //     $insert_attendance = $attendance_model->insertAttendance($employee_id, $employee_name, $department_id, $activity_type, $activity_description, $start_time, $submitted_by, $start_time);

    //     if($insert_attendance != false){
    //             echo json_encode(['status' => 'success']);
    //     }else{
    //             echo json_encode(['status' => 'failed']);
    //     }


    // }

    if(isset($_POST['employee_id']) && isset($_POST['total_seconds']) && isset($_POST['activity_type'])  && isset($_POST['employee_attendance_id'])){
        $employee_id = htmlspecialchars($_POST['employee_id'], ENT_QUOTES, 'UTF-8');
        $start_time = htmlspecialchars($_POST['total_seconds'], ENT_QUOTES, 'UTF-8');
        $end_time = $current_date;
        $activity_type = htmlspecialchars($_POST['activity_type'], ENT_QUOTES, 'UTF-8');
        $employee_attendance_id = htmlspecialchars($_POST['employee_attendance_id'], ENT_QUOTES, 'UTF-8');
        $start_timestamp = strtotime($start_time);
        $current_time = new DateTime();
        $current_time->setTimezone(new DateTimeZone('Asia/Manila'));
        $current_timestamp = $current_time->getTimestamp();
        $time_difference = $current_timestamp - $start_timestamp;


        $day = floor($time_difference / (60 * 60 * 24));
        $time_difference -= $day * (60 * 60 * 24);
        $hour = floor($time_difference / (60 * 60));
        $time_difference -= $hour * (60 * 60);
        $minute = floor($time_difference / 60);
        $time_difference -= $minute * 60;
        $second = $time_difference;

        $update_end_attendance = $attendance_model->updateEndtimeAttendance($end_time, $day, $hour, $minute, $second, $employee_id, $activity_type,  $employee_attendance_id);


        if($update_end_attendance != false){
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'failed']);
        }
    }

    if(isset($_POST['employee_id']) && isset($_POST['employee_name']) && isset($_POST['credential_id']) && isset($_POST['department_id']) && isset($_POST['activity_description']) && isset($_POST['activity_type'])){
        $employee_id = htmlspecialchars($_POST['employee_id'], ENT_QUOTES, 'UTF-8');
        $submitted_by = htmlspecialchars($_POST['credential_id'], ENT_QUOTES, 'UTF-8');
        $employee_name = htmlspecialchars($_POST['employee_name'], ENT_QUOTES, 'UTF-8');
        $department_id = htmlspecialchars($_POST['department_id'], ENT_QUOTES, 'UTF-8');
        $activity_type = htmlspecialchars($_POST['activity_type'], ENT_QUOTES, 'UTF-8');
        $activity_description = htmlspecialchars($_POST['activity_description'], ENT_QUOTES, 'UTF-8');
        $start_time  = $current_date;

        // $employee_id = "asdsa";
        // $submitted_by = "asdsa";
        // $employee_name ="asdsa" ;
        // $department_id = 2;
        // $activity_type =2;
        // $activity_description = "sdsf";

        $insert_activity = $attendance_model->insertAttendance($employee_id, $employee_name, $department_id, $activity_type, $activity_description, $start_time, $submitted_by, $start_time);

        if($insert_activity != false){
                echo json_encode(['status' => 'success', 'data' => $insert_activity]);
        }else{
                echo json_encode(['status' => 'failed', 'data' => $insert_activity]);
        }


    }

}
