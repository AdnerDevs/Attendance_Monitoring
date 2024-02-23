<?php
date_default_timezone_set('Asia/Manila');
$currentDateTime = new DateTime('now');
$current_date = $currentDateTime->format('Y-m-d H:i:s');

require_once ('../connection/dbh.php');
require_once ('../Model/AttendanceModel.php');

$attendance_model = new AttendanceModel();


$employee_id = '1234567891DEV';
$employee_name = 'John Luck';
$dept_id = 2;
$act_type  = 4;
$activity_description = 'sample act';
$start_time  = $currentDateTime;
$end  =  new DateTime('2024-02-25 17:00:00');
$end_time = $end->format('Y-m-d H:i:s');

$st = $current_date;

// Calculate the difference between $end and $start_time
$interval = $end->diff($start_time);
// Convert the difference to hours and minutes
$diff_in_hours = $interval->format('%d day, %h hrs, %i mns');

$submitted_by = '1234567891DEV';
$submitted_on = $end_time;



echo $diff_in_hours;

$insert_attendance = $attendance_model->insertAttendance($employee_id, $employee_name, $dept_id, $act_type, $activity_description, $st, $end_time, $diff_in_hours, $submitted_by, $submitted_on);
if($insert_attendance != false){
    echo 'succes';
}else{
    echo 'failed to insert';
}
