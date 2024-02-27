<?php


require_once ('../connection/dbh.php');
require_once ('../Model/EmployeeModel.php');

$employee_model = new EmployeeModel();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['emp_id']) && isset($_POST['emp_id'])){
        $employee_id = htmlspecialchars($_POST['emp_id'], ENT_QUOTES, 'UTF-8');

        $logoutEmployee = $employee_model->logoutEmployee($employee_id);

        if($logoutEmployee != false){
            echo 'success';
            session_start();
            session_unset();
            session_destroy();
        }else{
            echo 'failed';
            exit();
        }
    }
    if(isset($_POST['admin'])){
        echo 'success';
        session_start();
            session_unset();
            session_destroy();
    }
}


