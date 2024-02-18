<?php

require_once ('../connection/dbh.php');
require_once ('../Model/EmployeeModel.php');
require_once ('SignupController.php');


$employee_model = new EmployeeModel();
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['emp_id']) && isset($_POST['emp_name'])){
        $employee_id = htmlspecialchars($_POST['emp_id'], ENT_QUOTES, 'UTF-8');
        $employee_name = htmlspecialchars($_POST['emp_name'], ENT_QUOTES, 'UTF-8');

        $signup = new SignupController( $employee_name, $employee_id);

        $error = $signup->ValidateEmployee();
        if (empty($error)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'errors' => $error]);
        }
        
    }

    if(isset($_POST['emp_id_credential']) && isset($_POST['emp_name_credential'])){
        $employee_id = htmlspecialchars($_POST['emp_id_credential'], ENT_QUOTES, 'UTF-8');
        $employee_name = htmlspecialchars($_POST['emp_name_credential'], ENT_QUOTES, 'UTF-8');

        $login_user = $employee_model->loginUser( $employee_id, $employee_name  );
      
        if ($login_user != false) {
            echo json_encode('success');
        } else {
            echo json_encode( 'errors');
        }
        
    }
}
