<?php
require_once("../connection/dbh.php");
require_once("../Model/AdminAccountModel.php");
require_once("../Model/UserlevelModel.php");
require_once("../Controller/SignupControllerAdmin.php");
$admin_model = new AdminAccountModel();
$userlevel = new UserlevelModel();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['admin_id']) && isset($_POST['admin_username']) && isset($_POST['admin_completename']) && isset($_POST['userlevel'])) {

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

            if ($register != false) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'failed']);

            }

        } else {
            echo json_encode(['status' => 'error', 'errors' => $error]);
        }



    }

    if (isset($_POST['edit_admin_id']) && isset($_POST['edit_admin_username']) && isset($_POST['edit_admin_completename']) && isset($_POST['edit_userlevel'])) {

        $admin_id = htmlspecialchars($_POST['edit_admin_id'], ENT_QUOTES, 'UTF-8');
        $admin_username = htmlspecialchars($_POST['edit_admin_username'], ENT_QUOTES, 'UTF-8');
        $admin_completename = htmlspecialchars($_POST['edit_admin_completename'], ENT_QUOTES, 'UTF-8');
        $userlevel = htmlspecialchars($_POST['edit_userlevel'], ENT_QUOTES, 'UTF-8');

        $register = $admin_model->updateAdmin($admin_completename, $admin_username, $userlevel, $admin_id);
        header('Content-Type: application/json');
        if ($register != false) {
            echo json_encode(['status' => 'success']);

        } else {
            echo json_encode(['status' => 'failed']);
    
        }



    }

    if (isset($_POST['remove_admin_id']) ){
        $admin_id = htmlspecialchars($_POST['remove_admin_id'], ENT_QUOTES, 'UTF-8');

        $remove = $admin_model->removeAdmin($admin_id);
        if ($remove != false) {
            echo ( 'success');

        } else {
            echo ( 'failed');
    
        }

    }


}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['admin_id'])) {
        $admin_id = htmlspecialchars($_GET['admin_id'], ENT_QUOTES, 'UTF-8');

        try {
            $get_admin = $admin_model->getAdminById($admin_id);
            $getuserlevel = $userlevel->getAllUserlevel();

            $data = []; // Define an array to hold both $get_admin and $getuserlevel

            if ($get_admin != false) {
                $data['admin'] = $get_admin;
                $data['userlevel'] = $getuserlevel;

                echo json_encode($data); // Encode the associative array to JSON
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}



