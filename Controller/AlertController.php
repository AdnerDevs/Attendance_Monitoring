<?php 

require_once('../connection/dbh.php');
require_once('../Model/AlertModel.php');

$alert_model = new AlertModel();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['employee_id'])){
        $employee_id = htmlspecialchars($_POST['employee_id'], ENT_QUOTES, 'UTF-8');
        
        $result = $alert_model->fetch($employee_id);
        if( $result != false){
          
            echo json_encode($result);
        }else{
             // Return the result as JSON
            echo json_encode(false);
        }
       
    }
    if(isset($_POST['seen_employee_id'])){
        $employee_id = htmlspecialchars($_POST['seen_employee_id'], ENT_QUOTES, 'UTF-8');
        
        $result = $alert_model->updateNotification($employee_id);
        if( $result != false){
            // Return the result as JSON
            echo json_encode($result);
        }else{
             // Return the result as JSON
            echo json_encode(false);
        }
       
    }
    if(isset($_POST['notify_employee'])){
        $employee_id = htmlspecialchars($_POST['notify_employee'], ENT_QUOTES, 'UTF-8');

        $notify = $alert_model->notifyEmployee($employee_id);
        if( $notify != false){
            // Return the result as JSON
            echo json_encode($result);
        }else{
             // Return the result as JSON
            echo json_encode(false);
        }
       
    }
}