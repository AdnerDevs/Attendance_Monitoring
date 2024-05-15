<?php
include ("../connection/dbh.php");
include ("../Model/AttendanceModel.php");

$model = new AttendanceModel();



$rows;
if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
  $start_date = htmlspecialchars($_POST['start_date'], ENT_QUOTES, 'UTF-8');
  $end_date = htmlspecialchars($_POST['end_date'], ENT_QUOTES, 'UTF-8');
  $activity_type = htmlspecialchars($_POST['activity_type'], ENT_QUOTES, 'UTF-8');
  $employee_id = htmlspecialchars($_POST['employee_id'], ENT_QUOTES, 'UTF-8');



  if ($activity_type != 0 && $employee_id != 0 && $start_date != 'Invalid date' && $end_date != 'Invalid date') {
    $rows = $model->date_range_with_acitvity_and_employee($start_date, $end_date, $activity_type, $employee_id);

  }
  else  if ($start_date == 'Invalid date' && $end_date == 'Invalid date' && $activity_type == 0) {
    $rows = $model->fetchEmployees($employee_id);
  } else if ($start_date == 'Invalid date' && $end_date == 'Invalid date' && $employee_id == 0) {
    $rows = $model->fetchActivityOnly($activity_type);
  } else if ($start_date == 'Invalid date' && $end_date == 'Invalid date') {
    $rows = $model->fetchActivity($activity_type, $employee_id);
  }  else if ($activity_type != 0 && $start_date != 'Invalid date' && $end_date != 'Invalid date' && $employee_id == 0) {
    $rows = $model->date_range_with_acitvity_type($start_date, $end_date, $activity_type);
  } 
  else {
    $rows = $model->date_range($start_date, $end_date);
  }
}
 else {
  $rows = $model->fetch();

}

echo json_encode($rows);