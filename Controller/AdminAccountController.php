<?php 
require_once("../connection/dbh.php");
require_once("../Model/AdminAccountModel.php");
require_once("../Controller/SignupControllerAdmin.php");
$admin_model = new AdminAccountModel();


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['admin_id']) && isset( $_POST['admin_username']) && isset( $_POST['admin_completename']) && isset( $_POST['userlevel'])){

        $admin_id = htmlspecialchars($_POST['admin_id'], ENT_QUOTES, 'UTF-8');
        $admin_username = htmlspecialchars($_POST['admin_username'], ENT_QUOTES, 'UTF-8');
        $admin_completename = htmlspecialchars($_POST['admin_completename'], ENT_QUOTES, 'UTF-8');
        $userlevel = htmlspecialchars($_POST['userlevel'], ENT_QUOTES, 'UTF-8');
        $usertpye = 'admin';

        header('Content-Type: application/json');
        $signup = new SignupControllerAdmin($admin_id, $admin_username);
        $error = $signup->ValidateAdmin();

        if (empty($error)) {
                $register = $admin_model->registerAdmin($admin_id, $admin_username, $admin_completename, $userlevel, $usertpye);
            
                if($register != false){
                    echo json_encode(['status' => 'success']);
                }else{
                    echo json_encode(['status' => 'failed']);

                }
                
        } else {
            echo json_encode(['status' => 'error', 'errors' => $error]);
        }
        
        
    
    }
}

