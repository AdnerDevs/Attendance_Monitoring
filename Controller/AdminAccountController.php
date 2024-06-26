<?php
session_start();
require_once ("../connection/dbh.php");
require_once ("../Model/AdminAccountModel.php");
require_once ("../Model/UserlevelModel.php");
require_once ("../Controller/SignupControllerAdmin.php");
$admin_model = new AdminAccountModel();
$userlevel = new UserlevelModel();
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['admin_id']) && isset($_POST['admin_completename']) && isset($_POST['userlevel'])) {

        $admin_id = htmlspecialchars($_POST['admin_id'], ENT_QUOTES, 'UTF-8');
        $admin_completename = htmlspecialchars($_POST['admin_completename'], ENT_QUOTES, 'UTF-8');
        $userlevel = htmlspecialchars($_POST['userlevel'], ENT_QUOTES, 'UTF-8');
        $usertpye = 'admin';


        // $signup = new SignupControllerAdmin($admin_id, $admin_username);
        // $error = $signup->ValidateAdmin();

        // if (empty($error)) {
        $validate_id = $admin_model->checkID($admin_id);
        if ($validate_id == false) {
            echo json_encode(['status' => 'validate']);
        } else {
            $register = $admin_model->registerAdmin($admin_id, $admin_completename, $userlevel, $usertpye);

            if ($register != false) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'failed']);

            }
        }


        // } else {
        //     echo json_encode(['status' => 'error', 'errors' => $error]);
        // }



    }

    if (isset($_POST['edit_admin_id_old']) && isset($_POST['edit_admin_id_new']) && isset($_POST['edit_admin_completename']) && isset($_POST['edit_userlevel'])) {

        $admin_id = htmlspecialchars($_POST['edit_admin_id_old'], ENT_QUOTES, 'UTF-8');
        $admin_id_new = htmlspecialchars($_POST['edit_admin_id_new'], ENT_QUOTES, 'UTF-8');
        // $admin_username = htmlspecialchars($_POST['edit_admin_username'], ENT_QUOTES, 'UTF-8');
        $admin_completename = htmlspecialchars($_POST['edit_admin_completename'], ENT_QUOTES, 'UTF-8');
        $userlevel = htmlspecialchars($_POST['edit_userlevel'], ENT_QUOTES, 'UTF-8');

        // $register = $admin_model->updateAdmin($admin_completename, $userlevel, $admin_id);

        if (strcasecmp($admin_id, $admin_id_new) != 0) {
            $register = $admin_model->updateAdminID( $admin_completename, $userlevel, $admin_id, $admin_id_new);
            if ($register != false) {
                echo json_encode(['status' => 'success']);

            } else {
                echo json_encode(['status' => 'failed']);

            }
        } else {
            $register = $admin_model->updateAdmin($admin_completename, $userlevel, $admin_id);
            if ($register != false) {
                echo json_encode(['status' => 'success']);

            } else {
                echo json_encode(['status' => 'failed']);

            }
        }

        // if ($register != false) {
        //     echo json_encode(['status' => 'success']);

        // } else {
        //     echo json_encode(['status' => 'failed']);

        // }




    }

    if (isset($_POST['remove_admin_id'])) {
        $admin_id = htmlspecialchars($_POST['remove_admin_id'], ENT_QUOTES, 'UTF-8');

        $remove = $admin_model->removeAdmin($admin_id);
        if ($remove != false) {
            echo json_encode('success');

        } else {
            echo json_encode('failed');

        }

    }

    if (isset($_POST['get_all'])) {
        // if(isset($_SESSION['admin_id'])){


        $getall = $admin_model->getAllAdmin();
        if (!empty($getall)) {
            echo json_encode($getall);
        }

        // }
    }

    if (isset($_POST['restrict_admin']) && isset($_POST['data_value'])) {

        $remove_adminid = htmlspecialchars($_POST['restrict_admin'], ENT_QUOTES, 'UTF-8');
        $value = htmlspecialchars($_POST['data_value'], ENT_QUOTES, 'UTF-8');

        $toggleArchive = $admin_model->restrictAdmin($remove_adminid, $value);
        if ($toggleArchive != false) {
            echo json_encode($toggleArchive);
        } else {
            echo json_encode('false');
        }

    }


}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['admin_id'])) {

        if (isset($_SESSION['admin_id'])) {
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

    if (isset($_GET['get_all'])) {
        if (isset($_SESSION['admin_id'])) {


            $getall = $admin_model->getAllAdmin();
            if (!empty($getall)) {
                echo json_encode($getall);
            }

        }
    }

}



