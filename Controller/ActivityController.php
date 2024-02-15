<?php

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
}