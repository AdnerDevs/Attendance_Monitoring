<?php
date_default_timezone_set('Asia/Manila');
$currentDateTime = new DateTime('now');

$current_date = $currentDateTime->format('Y-m-d H:i:s');

header('Content-Type: application/json');
require_once('../connection/dbh.php');
require_once('../Model/AttendanceModel.php');

$attendance_model = new AttendanceModel();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

        if (isset($_POST['employee_id']) && isset($_POST['total_seconds']) && isset($_POST['activity_type']) && isset($_POST['employee_attendance_id'])) {
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
            $total_time = $current_timestamp - $start_timestamp;

            $update_end_attendance = $attendance_model->updateEndtimeAttendance($end_time, $total_time,  $employee_attendance_id);

            if ($update_end_attendance != false) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'failed']);

            }

         
        }

        if (isset($_POST['employee_id']) && isset($_POST['employee_name']) && isset($_POST['credential_id']) && isset($_POST['department_id']) && isset($_POST['activity_description']) && isset($_POST['activity_type'])) {
            $employee_id = htmlspecialchars($_POST['employee_id'], ENT_QUOTES, 'UTF-8');
            $submitted_by = htmlspecialchars($_POST['credential_id'], ENT_QUOTES, 'UTF-8');
            $employee_name = htmlspecialchars($_POST['employee_name'], ENT_QUOTES, 'UTF-8');
            $department_id = htmlspecialchars($_POST['department_id'], ENT_QUOTES, 'UTF-8');
            $activity_type = htmlspecialchars($_POST['activity_type'], ENT_QUOTES, 'UTF-8');
            $activity_description = htmlspecialchars($_POST['activity_description'], ENT_QUOTES, 'UTF-8');
            $start_time = $current_date;

            $insert_activity = $attendance_model->insertAttendance($employee_id, $employee_name, $department_id, $activity_type, $activity_description, $start_time, $submitted_by, $start_time);

            if ($insert_activity != false) {
                echo json_encode(['status' => 'success', 'data' => $insert_activity]);
            } else {
                echo json_encode(['status' => 'failed', 'data' => $insert_activity]);
            }

         
        }

        if(isset($_POST['remove_attendance'])){
            
            $employee_attendance_id = htmlspecialchars($_POST['remove_attendance'], ENT_QUOTES, 'utf-8');
            $remove = $attendance_model->removeAttendance($employee_attendance_id);

            if( $remove != false){
                // Return the result as JSON
                echo json_encode($remove);
            }else{
                 // Return the result as JSON
                echo json_encode(false);
            }
       

        }

    }

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   

            if (isset($_GET['employee_id'])) {

                $employee_id = htmlspecialchars($_GET['employee_id'], ENT_QUOTES, 'UTF-8');

                $get_data = $attendance_model->getEmployeeData($employee_id);
                if ($get_data != false) {
                    echo json_encode(['status' => 'success', 'data' => $get_data]);
                } else {
                    echo json_encode(['status' => 'failed']);
                }
            }
        
    }
