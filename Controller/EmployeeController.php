<?php

require_once ('../connection/dbh.php');
require_once ('../Model/EmployeeModel.php');
require_once ('SignupController.php');


$employee_model = new EmployeeModel();


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['emp_id']) && isset($_POST['emp_name']) && isset($_POST['n_name'])  && isset($_POST['dept_id'])  && isset($_POST['id_cred'])  && isset($_POST['s_name_cred']) ){
        header('Content-Type: application/json');
        $employee_id = htmlspecialchars($_POST['emp_id'], ENT_QUOTES, 'UTF-8');
        $employee_name = htmlspecialchars($_POST['emp_name'], ENT_QUOTES, 'UTF-8');
        $nickname = htmlspecialchars($_POST['n_name'], ENT_QUOTES, 'UTF-8');
        $department_id = htmlspecialchars($_POST['dept_id'], ENT_QUOTES, 'UTF-8');
        $id_credentials = htmlspecialchars($_POST['id_cred'], ENT_QUOTES, 'UTF-8');
        $surname_credentials = htmlspecialchars($_POST['s_name_cred'], ENT_QUOTES, 'UTF-8');
        $usertpye = 'employee';
        $signup = new SignupController($employee_name, $employee_id);

        $error = $signup->ValidateEmployee();
        if (empty($error)) {
            $validate_id = $employee_model->checkID($employee_id);
            if($validate_id == false){
                echo json_encode(['status' => 'validate']);
            }else{
               $register_employees = $employee_model->registerEmployee( $employee_id, $employee_name, $nickname, $department_id, $id_credentials, $surname_credentials, $usertpye);
                if ($register_employees != false) {
                    echo json_encode(['status' => 'success']);
                }else{
                    echo json_encode(['status' => 'failed']);
                }
            }

        } else {
            echo json_encode(['status' => 'error', 'errors' => $error]);
        }
        
    }

  
}
