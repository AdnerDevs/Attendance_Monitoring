<?php 
require_once('../connection/dbh.php');
require_once('../Model/LoginModel.php');
$login_model = new LoginModel();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['emp_id_credential']) && isset($_POST['emp_name_credential'])){
        $employee_id = htmlspecialchars($_POST['emp_id_credential'], ENT_QUOTES, 'UTF-8');
        $employee_name = htmlspecialchars($_POST['emp_name_credential'], ENT_QUOTES, 'UTF-8');

        // $employee_id = '321ADNER';
        // $employee_name = 'nerua';
        $login_user = $login_model->loginUser( $employee_id, $employee_name );
          
        if($login_user !== false) {
            echo json_encode(['success' => true, 'userType' => $login_user]);

        } else {
            echo json_encode(['success' => false, 'message' => 'Login failed']);
  
        }

    }
}