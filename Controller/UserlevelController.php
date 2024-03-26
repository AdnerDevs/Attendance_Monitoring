<?php
include "../connection/dbh.php";
include "../Model/UserlevelModel.php";
header('Content-Type: application/json');
$userlevel_model = new UserlevelModel();

// $userlevel_name = 'Superadmin';
// $dashboard_permission_view = 1;
// $admin_management_view = 1;
// $admin_management_create= 1;
// $admin_management_update = 1;
// $admin_management_delete = 1;
// $admin_management_archive = 1;
// $employee_management_view = 1; 
// $employee_management_create = 1;
// $employee_management_update = 1; 
// $employee_management_delete = 1; 
// $employee_monitoring_management_view = 1; 
// $employee_monitoring_management_create = 1; 
// $employee_monitoring_management_update = 1; 
// $employee_monitoring_management_delete = 1; 
// $announcement_view = 1;
// $announcement_create = 1;
// $announcement_update = 1; 
// $announcement_delete = 1; 
// $announcement_archive = 1; 
// $cms_permission_view = 1; 
// $cms_permission_update = 1;



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset ($_POST["formData"]) && isset ($_POST['userlevelname'])) {

        $formData = $_POST["formData"];
        $userlevel_name = htmlspecialchars($_POST['userlevelname'], ENT_QUOTES, 'UTF-8');
        // Define default values for permissions
        $defaultPermissions = [
            'dashboard' => [
                'view' => 0, // Default value for dashboard view permission

            ],
            'admin_management' => [
                'view' => 0, // Default value for admin_management view permission
                'create' => 0, // Default value for admin_management create permission
                'update' => 0, // Default value for admin_management update permission
                'delete' => 0, // Default value for admin_management delete permission
                'archive' => 0, // Default value for admin_management archive permission
            ],
            'employee_management' => [
                'view' => 0, // Default value for admin_management view permission
                'create' => 0, // Default value for admin_management create permission
                'update' => 0, // Default value for admin_management update permission
                'delete' => 0, // Default value for admin_management delete permission

            ],
            'employee_monitoring' => [
                'view' => 0, // Default value for admin_management view permission
                'create' => 0, // Default value for admin_management create permission
                'update' => 0, // Default value for admin_management update permission
                'delete' => 0, // Default value for admin_management delete permission

            ],
            'announcement' => [
                'view' => 0, // Default value for admin_management view permission
                'create' => 0, // Default value for admin_management create permission
                'update' => 0, // Default value for admin_management update permission
                'delete' => 0, // Default value for admin_management delete permission
                'archive' => 0, // Default value for admin_management archive permission
            ],
            // Define default values for other permissions similarly
        ];

        // Merge default permissions with form data
        $processedFormData = array_merge_recursive($defaultPermissions, $formData['permission']);
        // var_dump($processedFormData);
        $insert = $userlevel_model->insertUserlevels($userlevel_name, $processedFormData);

        if ($insert) {
            echo json_encode(["success" => true, "message" => "Inserted successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to insert data"]);
        }

    }

    if (isset ($_POST['update_userlevel']) && isset ($_POST["editFormData"]) && isset ($_POST['editUserlevelname'])) {

            $userlevel_id = $_POST['update_userlevel'];
            $formData = $_POST["editFormData"];
            $userlevel_name = htmlspecialchars($_POST['editUserlevelname'], ENT_QUOTES, 'UTF-8');
            // Define default values for permissions
            $defaultPermissions = [
                'dashboard' => [
                    'view' => 0, // Default value for dashboard view permission
    
                ],
                'admin_management' => [
                    'view' => 0, // Default value for admin_management view permission
                    'create' => 0, // Default value for admin_management create permission
                    'update' => 0, // Default value for admin_management update permission
                    'delete' => 0, // Default value for admin_management delete permission
                    'archive' => 0, // Default value for admin_management archive permission
                ],
                'employee_management' => [
                    'view' => 0, // Default value for admin_management view permission
                    'create' => 0, // Default value for admin_management create permission
                    'update' => 0, // Default value for admin_management update permission
                    'delete' => 0, // Default value for admin_management delete permission
    
                ],
                'employee_monitoring' => [
                    'view' => 0, // Default value for admin_management view permission
                    'create' => 0, // Default value for admin_management create permission
                    'update' => 0, // Default value for admin_management update permission
                    'delete' => 0, // Default value for admin_management delete permission
    
                ],
                'announcement' => [
                    'view' => 0, // Default value for admin_management view permission
                    'create' => 0, // Default value for admin_management create permission
                    'update' => 0, // Default value for admin_management update permission
                    'delete' => 0, // Default value for admin_management delete permission
                    'archive' => 0, // Default value for admin_management archive permission
                ],
                // Define default values for other permissions similarly
            ];
    
            $processedFormData = array_merge_recursive($defaultPermissions, $formData['permission']);
            // var_dump($processedFormData);
            $insert = $userlevel_model->updateUserlevel($userlevel_id, $userlevel_name, $processedFormData);
            if ($insert) {
                echo json_encode(["success" => true, "message" => "Updated successfully"]);
            } else {
                echo json_encode(["success" => false, "message" => "Failed to insert data"]);
            }
    }



    if (isset ($_POST['fetch_all'])) {
        // $id = $_POST['get_userlevel'];

        $getall = $userlevel_model->getAllUserlevel();

        header('Content-Type: application/json');
        echo json_encode($getall);
    }

    if (isset ($_POST['remove'])) {
        $userlevel_id = htmlspecialchars($_POST['remove'], ENT_QUOTES, 'UTF-8');

        $remove = $userlevel_model->delete($userlevel_id);

        if ($remove) {
            echo json_encode(['success' => true, 'message' => 'Userlevel has been removed']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Unable to remove userlevel']);
        }

    }
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset ($_GET['get_userlevel'])) {
        $id = $_GET['get_userlevel'];

        $wew = $userlevel_model->getUserlevelList($id);

        header('Content-Type: application/json');
        echo json_encode($wew);
    }
}