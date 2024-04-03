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

    if(isset($_POST['new_announcement_employee_id'])){
        $employee_id = htmlspecialchars($_POST['new_announcement_employee_id'], ENT_QUOTES, 'UTF-8');
        $fetch = $alert_model->fetchNotifyAnnouncement($employee_id);
        if( $fetch != false){
            // Return the result as JSON
            echo json_encode($fetch);
        }else{
             // Return the result as JSON
            echo json_encode(false);
        }
    }

    // UPDATE front end
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

    if(isset($_POST['seen_updated_announcement'])){
        $employee_id = htmlspecialchars($_POST['seen_updated_announcement'], ENT_QUOTES, 'UTF-8');
        
        $result = $alert_model->updateNotificationAnnouncement($employee_id);
        if( $result != false){
            // Return the result as JSON
            echo json_encode($result);
        }else{
             // Return the result as JSON
            echo json_encode(false);
        }
       
    }



    // UPDATE 
    if(isset($_POST['notify_employee'])){
        $employee_id = htmlspecialchars($_POST['notify_employee'], ENT_QUOTES, 'UTF-8');
        $message = "You have ongoing activity, please end it if you forgot to end your activity, thank you!";
        $notify = $alert_model->notifyEmployee($employee_id, $message);
        if( $notify != false){
            // Return the result as JSON
            echo json_encode($notify);
        }else{
             // Return the result as JSON
            echo json_encode(false);
        }
       
    }


}