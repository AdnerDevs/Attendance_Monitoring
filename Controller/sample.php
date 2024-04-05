<?php 

require_once ("../connection/dbh.php");
require_once ("../Model/EmployeeModel.php");
require_once ("../Model/AdminAccountModel.php");
require_once ("../Model/AlertModel.php");
$employee_model = new EmployeeModel();
$alert_model = new AlertModel();
$admin_model = new AdminAccountModel();
$get_all_employee_id = $employee_model->getAllEmployees();


$get = $admin_model->getAllAdmin();

var_dump($get);
// if (is_array($get_all_employee_id)) {
//     // Loop through each element
//     foreach ($get_all_employee_id as $employee_info) {
//         // Check if the element is an array or an object
//         if (is_array($employee_info) && isset($employee_info['employee_id'])) {
//             $message = "New Announcement has been uploaded, click this to refresh the page.";
//             $employee_id = $employee_info['employee_id'];
//             $status = 1;
//             // var_dump($employee_id);
//             $alert_employee_announcement = $alert_model->notifyUpdateAnnouncement($employee_id, $message, );
//             if($alert_employee_announcement != false){
//                 var_dump($alert_employee_announcement);
//             }else{
//                 var_dump($alert_employee_announcement);
//             }
//         }else {
//             echo "Error: Employee ID not found in the element.";
//         }
//     }
// } 