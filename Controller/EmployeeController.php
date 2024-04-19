<?php

require_once ('../connection/dbh.php');
require_once ('../Model/EmployeeModel.php');
require_once ('SignupController.php');


$employee_model = new EmployeeModel();


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['emp_id']) && isset($_POST['emp_name'])  && isset($_POST['dept_id']) && isset($_POST['pos_id'])){
        header('Content-Type: application/json');
        $employee_id = htmlspecialchars($_POST['emp_id'], ENT_QUOTES, 'UTF-8');
        $employee_name = htmlspecialchars($_POST['emp_name'], ENT_QUOTES, 'UTF-8');
        // $nickname = htmlspecialchars($_POST['n_name'], ENT_QUOTES, 'UTF-8');
        $department_id = htmlspecialchars($_POST['dept_id'], ENT_QUOTES, 'UTF-8');
        $position_id = htmlspecialchars($_POST['pos_id'], ENT_QUOTES, 'UTF-8');
        // $id_credentials = htmlspecialchars($_POST['emp_id'], ENT_QUOTES, 'UTF-8');
        // $surname_credentials = htmlspecialchars($_POST['s_name_cred'], ENT_QUOTES, 'UTF-8');
        $usertpye = 'employee';

        // $signup = new SignupController($employee_name, $employee_id);
        // $error = $signup->ValidateEmployee();

        // if (empty($error)) {
            $validate_id = $employee_model->checkID($employee_id);
            if($validate_id == false){
                echo json_encode(['status' => 'validate']);
            }else{
               $register_employees = $employee_model->registerEmployee($employee_id, $employee_name, $department_id, $position_id, $usertpye);
                if ($register_employees != false) {
                    echo json_encode(['status' => 'success']);
                }else{
                    echo json_encode(['status' => 'failed']);
                }
            }
            // echo json_encode($validate_id);

        // } else {
        //     echo json_encode(['status' => 'error', 'errors' => $error]);
        // }
 
        
    }

    if(isset($_POST['fetch_employee'])){

        $fetch  = $employee_model->getAllEmployees();

        echo json_encode($fetch);

    }


    // update

    if(isset($_POST['edit_emp_id_old']) && isset($_POST['edit_emp_id_new']) && isset($_POST['edit_name'])  && isset($_POST['edit_dept_id']) && isset($_POST['edit_pos_id'])){

        $employee_id_old = htmlspecialchars($_POST['edit_emp_id_old'], ENT_QUOTES, 'UTF-8');
        $employee_id_new = htmlspecialchars($_POST['edit_emp_id_new'], ENT_QUOTES, 'UTF-8');

        $employee_name = htmlspecialchars($_POST['edit_name'], ENT_QUOTES, 'UTF-8');

        $department_id = htmlspecialchars($_POST['edit_dept_id'], ENT_QUOTES, 'UTF-8');
        $position_id = htmlspecialchars($_POST['edit_pos_id'], ENT_QUOTES, 'UTF-8');

        if (strcasecmp($employee_id_old, $employee_id_new) != 0) {
            $update = $employee_model->updateEmployeeID( $employee_name, $department_id, $position_id, $employee_id_old, $employee_id_new);
            if ($update != false) {
                echo json_encode(['status' => 'success']);

            } else {
                echo json_encode(['status' => 'failed']);

            }
      
        } else {


            $update = $employee_model->updateEmployee( $employee_name, $department_id, $position_id, $employee_id_old);
            if ($update != false) {
                echo json_encode(['status' => 'success']);

            } else {
                echo json_encode(['status' => 'failed']);

            }
        }

        
    }

    if(isset($_POST['remove_employee'])){

        $employee_id = htmlspecialchars($_POST['remove_employee'], ENT_QUOTES, "UTF-8");

        $remove_employees = $employee_model->removeEmployee($employee_id);
        if ($remove_employees != false) {
            echo json_encode(["status"=> "success"]);
        }else{
            echo json_encode(["status"=> "failed"]);
        }
        

    }

  
}
