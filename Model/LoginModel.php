<?php 

class LoginModel extends Dbh{
    
    public function loginUser($employee_id, $employee_name ){
        try{
            $stmt = $this->connect()->prepare("SELECT * FROM login_credentials WHERE credential_id = ? AND credential_surname = ?");

            if(!$stmt->execute(array($employee_id, $employee_name))){
                return false;
                exit();
            }
            // session_start();

            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$userData) {
                // No row found, return false or throw an exception
                return false;
            }
            $usertype = $userData['user_type'];
            // if($usertype == 'employee'){
            //     $id = $userData["employee_id"];

            //     $browse = $this->employeeData($id);
            //     if($browse != false){
            //         return true;
            //     }else{
            //         return "admin";
            //     }
            // }
            $id = $userData["employee_id"];

            switch(strtolower($usertype)){
                case "employee":
                    $this->employeeData($id);
                    break;
                case "admin":
                    $this->AdminData($id);
                    break;
            }
            // $id = $userData["employee_id"];

            // if($userData["credential_id"] != $employee_id){
            //     return false;
            //     exit();
            // }

            // $stmt2 = $this->connect()->prepare('SELECT * FROM employee_user WHERE employee_id = ? AND isRemove != 1');

            // if(!$stmt2->execute([$id])){
            //     return false;
            //     exit();
            // }
      
            // $stmt3 = $this->connect()->prepare("UPDATE employee_user SET status = 1 WHERE employee_id = ?");
            // $stmt3->execute([$id]);

    
            // $userData2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            // $id2 = $userData2["employee_id"];
            // if($userData2["employee_id"] != $id2){
            //     return false;
            //     exit();
            // }

            // $_SESSION['employee_id'] = $userData2['employee_id'];
            // $_SESSION['employee_name'] = $userData2['employee_name'];

            return $usertype;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
            return false;
        }finally{
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
        }
    }

    public function employeeData($employee_id){
        try{
            $stmt = $this->connect()->prepare('SELECT * FROM employee_user WHERE employee_id = ? AND isRemove != 1');

            if(!$stmt->execute([$employee_id])){
                return false;
            }

            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$userData) {
                return false;
            }
            session_start();
      
            $stmt2 = $this->connect()->prepare("UPDATE employee_user SET status = 1 WHERE employee_id = ?");
            $stmt2->execute([$employee_id]);


          

            $_SESSION['employee_id'] = $userData['employee_id'];
            $_SESSION['employee_name'] = $userData['employee_name'];
            return true;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
            exit();
        }finally{
            $stmt = null;
            $stmt2 = null;

        }
    }

    public function AdminData($employee_id){
        try{
            $stmt = $this->connect()->prepare('SELECT * 
            FROM admin_user au
            INNER JOIN userlevel ul ON au.userlevel_id = ul.userlevel_id
            WHERE au.admin_id = ? AND au.isRemove != 1 AND au.isArchive != 1');

            if(!$stmt->execute([$employee_id])){
                return false;
            }

            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$userData) {
                return false;
            }
            session_start();
      
            $stmt2 = $this->connect()->prepare("UPDATE admin_user SET status = 1 WHERE admin_id = ?");
            $stmt2->execute([$employee_id]);



            $_SESSION['admin_id'] = $userData['admin_id'];
            $_SESSION['dashboard_permission_view'] = $userData['dashboard_permission_view'];
            // Admin 
            $_SESSION['admin_management_view'] = $userData['admin_management_view'];
            $_SESSION['admin_management_create'] = $userData['admin_management_create'];
            $_SESSION['admin_management_update'] = $userData['admin_management_update'];
            $_SESSION['admin_management_delete'] = $userData['admin_management_delete'];
            $_SESSION['admin_management_archive'] = $userData['admin_management_archive'];

            // Employee management 
            $_SESSION['employee_management_view'] = $userData['employee_management_view'];
            $_SESSION['employee_management_create'] = $userData['employee_management_create'];
            $_SESSION['employee_management_update'] = $userData['employee_management_update'];
            $_SESSION['employee_management_delete'] = $userData['employee_management_delete'];

            // Employee monitoring 
            $_SESSION['employee_monitoring_management_view'] = $userData['employee_monitoring_management_view'];
            $_SESSION['employee_monitoring_management_create'] = $userData['employee_monitoring_management_create'];
            $_SESSION['employee_monitoring_management_update'] = $userData['employee_monitoring_management_update'];
            $_SESSION['employee_monitoring_management_delete'] = $userData['employee_monitoring_management_delete'];
            // Announcement 
            $_SESSION['announcement_view'] = $userData['announcement_view'];
            $_SESSION['announcement_create'] = $userData['announcement_create'];
            $_SESSION['announcement_update'] = $userData['announcement_update'];
            $_SESSION['announcement_delete'] = $userData['announcement_delete'];
            $_SESSION['announcement_archive'] = $userData['announcement_archive'];
            // cms
            $_SESSION['cms_permission_view'] = $userData['cms_permission_view'];
            $_SESSION['cms_permission_update'] = $userData['cms_permission_update'];
            return true;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
            exit();
        }finally{
            $stmt = null;
            $stmt2 = null;

        }
    }

}