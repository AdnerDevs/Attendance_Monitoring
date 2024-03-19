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



if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST["formData"]) && isset($_POST['userlevel_name'])){

        $formData = $_POST["formData"];
        $userlevelName = $_POST['userlevel_name'];
    
        // Example of processing form data
        $checkboxData = [];
        foreach ($formData as $name => $value) {
            // Check if the name starts with 'permission[' and ends with ']'
            if (strpos($name, 'permission[') === 0 && substr($name, -1) === ']') {
                // Extract the checkbox name from the key
                $checkboxName = substr($name, 11, -1);
    
                // Assign the checkbox value to the checkbox name in the $checkboxData array
                $checkboxData[$checkboxName] = $value;
            }
        }
            echo json_encode( $formData);
        
            // Now $checkboxData contains the checkbox names and their corresponding values (1 or 0)
        
            // Example of inserting checkbox data into the database using your insertUserlevel method
            // $userlevel_name = $_POST['userlevel_name']; // Assuming you have a form field named 'userlevel_name'
        
            // // Call the insertUserlevel method with the checkbox data and other parameters
            // $success = $userlevel_model->insertUserlevel(
            //     $userlevel_name,
            //     $checkboxData['dashboard']['view'],
            //     $checkboxData['admin_management']['view'],
            //     $checkboxData['admin_management']['create'],
            //     $checkboxData['admin_management']['update'],
            //     $checkboxData['admin_management']['delete'],
            //     $checkboxData['admin_management']['archive'],
            //     $checkboxData['employee_management']['view'],
            //     $checkboxData['employee_management']['create'],
            //     $checkboxData['employee_management']['update'],
            //     $checkboxData['employee_management']['delete'],
            //     $checkboxData['employee_monitoring_management']['view'],
            //     $checkboxData['employee_monitoring_management']['create'],
            //     $checkboxData['employee_monitoring_management']['update'],
            //     $checkboxData['employee_monitoring_management']['delete'],
            //     $checkboxData['announcement']['view'],
            //     $checkboxData['announcement']['create'],
            //     $checkboxData['announcement']['update'],
            //     $checkboxData['announcement']['delete'],
            //     $checkboxData['announcement']['archive'],
            //     $checkboxData['cms_permission']['view'],
            //     $checkboxData['cms_permission']['update']
            // );
        
            // if ($success) {
            //     // Insertion successful
            //     echo json_encode(array('success' => true));
            // } else {
            //     // Insertion failed
            //     echo json_encode(array('success' => false));
            // }
        } else {
            // Handle cases where the request method is not POST
            // You might want to return an error response or perform other actions here
        }
    }
//     if(isset($_POST["save_userlevel"]))
//     {
//         $userlevel_name = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    
//         //Process permissions for different modules
//         $dashboard_permission_view = isset($_POST["permission"]["dashboard"]["view"]) ? 1 : 0;

    
//         //Admin Management
//         $admin_management_view = isset($_POST["permission"]["admin_management"]["view"]) ? 1 : 0;
//         $admin_management_create = isset($_POST["permission"]["admin_management"]["create"]) ? 1 : 0;
//         $admin_management_update = isset($_POST["permission"]["admin_management"]["update"]) ? 1 : 0;
//         $admin_management_delete = isset($_POST["permission"]["admin_management"]["delete"]) ? 1 : 0;
//         $admin_management_archive = isset($_POST["permission"]["admin_management"]["archive"]) ? 1 : 0;
    
//         //Initialize variables for contentManagement permission
//         $employee_management_view = isset($_POST["permission"]["employee_management"]["view"]) ? 1 : 0;
//         $employee_management_create = isset($_POST["permission"]["employee_management"]["create"]) ? 1 : 0;
//         $employee_management_update = isset($_POST["permission"]["employee_management"]["update"]) ? 1 : 0;
//         $employee_management_delete = isset($_POST["permission"]["employee_management"]["delete"]) ? 1 : 0;
    
//         //Initialize variables for fileManagement permission
//         $employee_monitoring_management_view = isset($_POST["permission"]["employee_monitoring"]["view"]) ? 1 : 0;
//         $employee_monitoring_management_create = isset($_POST["permission"]["employee_monitoring"]["create"]) ? 1 : 0;
//         $employee_monitoring_management_update = isset($_POST["permission"]["employee_monitoring"]["update"]) ? 1 : 0;
//         $employee_monitoring_management_delete = isset($_POST["permission"]["employee_monitoring"]["delete"]) ? 1 : 0;
//         $employee_monitoring_management_delete= isset($_POST["permission"]["employee_monitoring"]["archive"]) ? 1 : 0;
    
//        // Announcement
//         $announcement_view = isset($_POST["permission"]["announcement"]["view"]) ? 1 : 0;
//         $announcement_create = isset($_POST["permission"]["announcement"]["create"]) ? 1 : 0;
//         $announcement_update = isset($_POST["permission"]["announcement"]["update"]) ? 1 : 0;
//         $announcement_delete = isset($_POST["permission"]["announcement"]["delete"]) ? 1 : 0;
//         $announcement_archive= isset($_POST["permission"]["announcement"]["archive"]) ? 1 : 0;
    
//         // Initialize variables for marketing management permission
//         $cms_permission_view = isset($_POST["permission"]["cms"]["view"]) ? 1 : 0;
//         $cms_permission_update = isset($_POST["permission"]["cms"]["create"]) ? 1 : 0;
//         $cms_update = isset($_POST["permission"]["cms"]["update"]) ? 1 : 0;
//         $cms_delete = isset($_POST["permission"]["cms"]["delete"]) ? 1 : 0;
//         $cms_archive = isset($_POST["permission"]["cms"]["archive"]) ? 1 : 0;
   
//         if($userlevel_name == '' || empty($userlevel_name)){
//             session_start();
//             $_SESSION['empty_uname'] = 'empty username';

//             // header('location:../admin/Userlevel.php');
//             // exit;
//             // header('Content-Type: application/json');
//             // echo json_encode($getall);
//         }else{
//             $insert_userlevel = $userlevel_model->insertUserlevel(
//                 $userlevel_name, 
//                 $dashboard_permission_view, 
//                 $admin_management_view, $admin_management_create,$admin_management_update,$admin_management_delete,$admin_management_archive, 
//                 $employee_management_view, $employee_management_create, $employee_management_update, $employee_management_delete, 
//                 $employee_monitoring_management_view, $employee_monitoring_management_create, $employee_monitoring_management_update, $employee_monitoring_management_delete, 
//                 $announcement_view, $announcement_create, $announcement_update, $announcement_delete, $announcement_archive, $cms_permission_view, $cms_permission_update
//                 );
            
                
//             if($insert_userlevel != false){
//                 // header('location:../admin/Userlevel.php');
//                 // exit;
//                 header('Content-Type: application/json');
//                 echo json_encode($insert_userlevel);
//             }
//         }
       
//     }

//     if(isset($_POST['fetch_all'])){
//         // $id = $_POST['get_userlevel'];
        
//          $getall = $userlevel_model->getAllUserlevel();

//         header('Content-Type: application/json');
//         echo json_encode($getall);
//     }

    

   
// }

// if($_SERVER['REQUEST_METHOD'] == 'GET'){
//     if(isset($_GET['get_userlevel'])){
//         $id = $_GET['get_userlevel'];
        
//          $wew= $userlevel_model->getUserlevelList($id);

//         header('Content-Type: application/json');
//         echo json_encode($wew);
//     }
// }