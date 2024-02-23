<?php
//  include "../connection/dbh.php";
//  include "../Model/UserlevelModel.php";
 
//  $AddNewUserLevel = new UserLevel();
//  $AddNewUserLevel->setUserLevel($name, $dashboard_view, $dashboard_edit,$orderManagement_view ,  $orderManagement_create, $contentManagement_view, $contentManagement_create, $contentManagement_edit,$contentManagement_delete,  $fileManagement_view, $fileManagement_create,  $fileManagement_edit, $fileManagement_delete, $fileManagement_archive, $statisticsManagement_view, $statisticsManagement_create, $chatManagement_view, $chatManagement_create,   $marketingManagement_view,  $marketingManagement_create,  $marketingManagement_edit, $marketingManagement_delete,  $marketingManagement_archive );

 // $AddNewUserLevel->setUserLevel($name, $dashboard_view, $dashboard_edit,$appointmentManagement_view,  $appointmentManagement_create, $appointmentManagement_edit, $appointmentManagement_delete,$accountManagement_view,  $accountManagement_create, $accountManagement_edit, $accountManagement_delete,$accountManagement_archive,  $accountManagement_ban, $contentManagement_view, $contentManagement_create, $contentManagement_edit,$contentManagement_delete,  $fileManagement_view, $fileManagement_create,  $fileManagement_edit, $fileManagement_delete);

 
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["save_userlevel"]))
    {
        $admin_name = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    
        // Process permissions for different modules
        $dashboard_view = isset($_POST["permission"]["dashboard"]["view"]) ? 1 : 0;

    
        //Admin Management
        $AdminManagement_view = isset($_POST["permission"]["admin_management"]["view"]) ? 1 : 0;
        $AdminManagement_create = isset($_POST["permission"]["admin_management"]["create"]) ? 1 : 0;
        $AdminManagement_update = isset($_POST["permission"]["admin_management"]["update"]) ? 1 : 0;
        $AdminManagement_delete = isset($_POST["permission"]["admin_management"]["delete"]) ? 1 : 0;
        $AdminManagement_archive = isset($_POST["permission"]["admin_management"]["archive"]) ? 1 : 0;
    
        // Initialize variables for contentManagement permission
        $employee_management_view = isset($_POST["permission"]["employee_management"]["view"]) ? 1 : 0;
        $employee_management_create = isset($_POST["permission"]["employee_management"]["create"]) ? 1 : 0;
        $employee_management_edit = isset($_POST["permission"]["employee_management"]["update"]) ? 1 : 0;
        $employee_management_delete = isset($_POST["permission"]["employee_management"]["delete"]) ? 1 : 0;
    
        // Initialize variables for fileManagement permission
        $employee_monitoring_view = isset($_POST["permission"]["employee_monitoring"]["view"]) ? 1 : 0;
        $employee_monitoring_create = isset($_POST["permission"]["employee_monitoring"]["create"]) ? 1 : 0;
        $employee_monitoring_update = isset($_POST["permission"]["employee_monitoring"]["update"]) ? 1 : 0;
        $employee_monitoring_delete = isset($_POST["permission"]["employee_monitoring"]["delete"]) ? 1 : 0;
        $employee_monitoring_archive= isset($_POST["permission"]["employee_monitoring"]["archive"]) ? 1 : 0;
    
        //Announcement
        $announcement_view = isset($_POST["permission"]["announcement"]["view"]) ? 1 : 0;
        $announcement_create = isset($_POST["permission"]["announcement"]["create"]) ? 1 : 0;
        $announcement_update = isset($_POST["permission"]["announcement"]["update"]) ? 1 : 0;
        $announcement_delete = isset($_POST["permission"]["announcement"]["delete"]) ? 1 : 0;
        $announcement_archive= isset($_POST["permission"]["announcement"]["archive"]) ? 1 : 0;
    
        // Initialize variables for marketing management permission
        $cms_view = isset($_POST["permission"]["cms"]["view"]) ? 1 : 0;
        $cms_create = isset($_POST["permission"]["cms"]["create"]) ? 1 : 0;
        $cms_update = isset($_POST["permission"]["cms"]["update"]) ? 1 : 0;
        $cms_delete = isset($_POST["permission"]["cms"]["delete"]) ? 1 : 0;
        $cms_archive = isset($_POST["permission"]["cms"]["archive"]) ? 1 : 0;
    
        echo '<pre>';

        echo "Name: ";
        print_r($admin_name);
        echo "\n";

        echo "dashboard: ";
        print_r($dashboard_view);
        echo "\n";

        echo "AdminManagement_view: ";
        print_r($AdminManagement_view);
        echo "\n";
        
        echo "AdminManagement_create: ";
        print_r($AdminManagement_create);
        echo "\n";
        
        echo "AdminManagement_update: ";
        print_r($AdminManagement_update);
        echo "\n";
        
        echo "AdminManagement_delete: ";
        print_r($AdminManagement_delete);
        echo "\n";
        
        echo "AdminManagement_archive: ";
        print_r($AdminManagement_archive);
        echo "\n";
        
        echo "Employee Management view: ";
        print_r($employee_management_view);
        echo "\n";
        
        echo "Employee Management create: ";
        print_r($employee_management_create);
        echo "\n";
        
        echo "Employee Management edit: ";
        print_r($employee_management_edit);
        echo "\n";
        
        echo "Employee Management delete: ";
        print_r($employee_management_delete);
        echo "\n";
        
        echo "Employee Monitoring view: ";
        print_r($employee_monitoring_view);
        echo "\n";
        
        echo "Employee Monitoring create: ";
        print_r($employee_monitoring_create);
        echo "\n";
        
        echo "Employee Monitoring update: ";
        print_r($employee_monitoring_update);
        echo "\n";
        
        echo "Employee Monitoring delete: ";
        print_r($employee_monitoring_delete);
        echo "\n";
        
        echo "Employee Monitoring archive: ";
        print_r($employee_monitoring_archive);
        echo "\n";
        
        echo "Announcement view: ";
        print_r($announcement_view);
        echo "\n";
        
        echo "Announcement create: ";
        print_r($announcement_create);
        echo "\n";
        
        echo "Announcement update: ";
        print_r($announcement_update);
        echo "\n";
        
        echo "Announcement delete: ";
        print_r($announcement_delete);
        echo "\n";
        
        echo "Announcement archive: ";
        print_r($announcement_archive);
        echo "\n";
        
        echo "CMS view: ";
        print_r($cms_view);
        echo "\n";
        
        echo "CMS create: ";
        print_r($cms_create);
        echo "\n";
        
        echo "CMS update: ";
        print_r($cms_update);
        echo "\n";
        
        echo "CMS delete: ";
        print_r($cms_delete);
        echo "\n";
        
        echo "CMS archive: ";
        print_r($cms_archive);
        echo "\n";
        echo '</pre>';
        
    
    
    }

   
}