<?php
// date_default_timezone_set('Asia/Manila');
// $currentDateTime = new DateTime('now');
// $current_date = $currentDateTime->format('Y-m-d H:i:s');

// require_once ('../connection/dbh.php');
// require_once ('../Model/AttendanceModel.php');

// $attendance_model = new AttendanceModel();


// $employee_id = '1234567891DEV';
// $employee_name = 'John Luck';
// $dept_id = 2;
// $act_type  = 4;
// $activity_description = 'sample act';
// $start_time  = $currentDateTime;
// $end  =  new DateTime('2024-02-25 17:00:00');
// $end_time = $end->format('Y-m-d H:i:s');

// $st = $current_date;

// // Calculate the difference between $end and $start_time
// $interval = $end->diff($start_time);
// // Convert the difference to hours and minutes
// $diff_in_hours = $interval->format('%d day, %h hrs, %i mns');

// $timer = 

// $day = 
// $hour = 
// $minutes = 
// $seconds = 

// $submitted_by = '1234567891DEV';
// $submitted_on = $end_time;



// echo $diff_in_hours;

// $insert_attendance = $attendance_model->insertAttendance($employee_id, $employee_name, $dept_id, $act_type, $activity_description, $st, $end_time, $diff_in_hours, $submitted_by, $submitted_on);
// if($insert_attendance != false){
//     echo 'succes';
// }else{
//     echo 'failed to insert';
// }
// $totalSeconds = 10000; // For example, 10,000 seconds
// $days = floor($totalSeconds / (60 * 60 * 24));
// $totalSeconds -= $days * (60 * 60 * 24);
// $hours = floor($totalSeconds / (60 * 60));
// $totalSeconds -= $hours * (60 * 60);
// $minutes = floor($totalSeconds / 60);
// $totalSeconds -= $minutes * 60;
// $seconds = $totalSeconds;

// echo "$days days, $hours hours, $minutes minutes, $seconds seconds";
// Example input
$intervalString = "1 day, 2 hrs, 30 mns";

// Convert interval string to array
$intervalArray = explode(", ", $intervalString);

// Extract components
$days = 0;
$hours = 0;
$minutes = 0;
foreach ($intervalArray as $intervalPart) {
    if (strpos($intervalPart, 'day') !== false) {
        $days = (int) filter_var($intervalPart, FILTER_SANITIZE_NUMBER_INT);
    } elseif (strpos($intervalPart, 'hrs') !== false) {
        $hours = (int) filter_var($intervalPart, FILTER_SANITIZE_NUMBER_INT);
    } elseif (strpos($intervalPart, 'mns') !== false) {
        $minutes = (int) filter_var($intervalPart, FILTER_SANITIZE_NUMBER_INT);
    }
}

// Output components
echo "Days: $days, Hours: $hours, Minutes: $minutes";
