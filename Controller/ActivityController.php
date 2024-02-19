<?php
date_default_timezone_set('Asia/Manila');
$currentDateTime = new DateTime('now');
$current_date = $currentDateTime->format('Y-m-d H:i:s');

require_once ('../connection/dbh.php');
require_once ('../Model/ActivityModel.php');

$activity_model = new ActivityModel();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST["act_type"])){
        $act_type = htmlspecialchars($_POST["act_type"], ENT_QUOTES, 'UTF-8');
        $current_date = date("Y-m-d H:i:s");
        $addActivityType = $activity_model->insertActivityType($act_type, $current_date);

        if($addActivityType !== false){
            echo "success";
        }else{
            echo "failed";
            die();
        }
    }

    if(isset($_POST["edit_act_type"]) && isset( $_POST["edit_act_id"])){
        $act_type = htmlspecialchars($_POST["edit_act_type"], ENT_QUOTES, 'UTF-8');
        $activity_id = htmlspecialchars($_POST["edit_act_id"], ENT_QUOTES, 'UTF-8');
        $current_date = date("Y-m-d H:i:s");
        
        $editActivityType = $activity_model->updateActivityType($act_type, $current_date, $activity_id);

        if($editActivityType !== false){
            echo "success";
        }else{
            echo "failed";
            die();
        }
    }

    if(isset( $_POST["delete_act_id"])){
        
        $activity_id = htmlspecialchars($_POST["delete_act_id"], ENT_QUOTES, 'UTF-8');
        $deleteActivity = $activity_model->deleteActivityType($activity_id);

        if($deleteActivity !== false){
            echo "success";
        }else{
            echo "failed";
            die();
        }
    }

    if(isset( $_POST["archive_act_id"])){
        
        $activity_id = htmlspecialchars($_POST["archive_act_id"], ENT_QUOTES, 'UTF-8');
        $archiveActivity = $activity_model->archiveActivityType($activity_id);

        if($archiveActivity !== false){
            echo "success";
        }else{
            echo "failed";
            die();
        }
    }

    if(isset( $_POST["unarchive_act_id"])){
        
        $activity_id = htmlspecialchars($_POST["unarchive_act_id"], ENT_QUOTES, 'UTF-8');
        $unarchiveActivity = $activity_model->unarchiveActivityType($activity_id);

        if($unarchiveActivity !== false){
            echo "success";
        }else{
            echo "failed";
            die();
        }
    }
}