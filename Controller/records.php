<?php 
include ("../connection/dbh.php");
include ("../Model/AttendanceModel.php");

$model = new AttendanceModel();



$rows;
if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $start_date = htmlspecialchars($_POST['start_date'], ENT_QUOTES, 'UTF-8');
    $end_date = htmlspecialchars($_POST['end_date'], ENT_QUOTES, 'UTF-8');

    $rows = $model->date_range($start_date, $end_date);

 }else{
    $rows =  $model->fetch() ;
    
 }

 echo json_encode( $rows );