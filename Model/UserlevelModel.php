<?php 

class UserlevelModel extends Dbh{

    public function getAllUserlevel(){
        try{
            $stmt = $this->connect()->prepare('SELECT * FROM userlevel WHERE isDeleted != 1');

            if(!$stmt->execute()){
                return false;
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        }catch(PDOException $e){
            print_r('erro:' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }

    public function getUserlevelList($id){
        try{
            $stmt = $this->connect()->prepare('SELECT * FROM userlevel WHERE userlevel_id = ? AND isDeleted != 1');

            if(!$stmt->execute([$id])){
                return false;
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            print_r('erro:' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }
    public function insertUserlevel(
        $userlevel_name, 
        $dashboard_permission_view, 
        $admin_management_view, $admin_management_create,$admin_management_update,$admin_management_delete,$admin_management_archive, 
        $employee_management_view, $employee_management_create, $employee_management_update, $employee_management_delete, $employee_monitoring_management_view, $employee_monitoring_management_create, $employee_monitoring_management_update, $employee_monitoring_management_delete, 
        $announcement_view, $announcement_create, $announcement_update, $announcement_delete, $announcement_archive
        ){
        try{

            $stmt = $this->connect()->prepare('INSERT INTO userlevel 
            (
                userlevel_name, dashboard_permission_view, admin_management_view, admin_management_create,admin_management_update,admin_management_delete,admin_management_archive, employee_management_view, employee_management_create, employee_management_update, employee_management_delete, employee_monitoring_management_view, employee_monitoring_management_create, employee_monitoring_management_update, employee_monitoring_management_delete, announcement_view, announcement_create, announcement_update, announcement_delete, announcement_archive
            )
            VALUES
            (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )
            ');


            if(!$stmt->execute([
                $userlevel_name, 
                $dashboard_permission_view, 
                $admin_management_view, $admin_management_create,$admin_management_update,$admin_management_delete,$admin_management_archive, 
                $employee_management_view, $employee_management_create, $employee_management_update, $employee_management_delete, $employee_monitoring_management_view, $employee_monitoring_management_create, $employee_monitoring_management_update, $employee_monitoring_management_delete, 
                $announcement_view, $announcement_create, $announcement_update, $announcement_delete, $announcement_archive
                ])){
                return false;
            }

            return true;

        }catch(PDOException $e){
            print_r('error: '. $e->getMessage());
        }finally{
            $stmt = null;
        }
    }

    public function insertUserlevels($userlevel_name, $processedFormData) {
        try {
            // Convert checkbox values to integers
            $dashboard_view = intval($processedFormData['dashboard']['view']);
            $admin_management_view = intval($processedFormData['admin_management']['view']);
            $admin_management_create = intval($processedFormData['admin_management']['create']);
            $admin_management_update = intval($processedFormData['admin_management']['update']);
            $admin_management_delete = intval($processedFormData['admin_management']['delete']);
            $admin_management_archive = intval($processedFormData['admin_management']['archive']);

            $employee_management_view =intval($processedFormData['employee_management']['view']);
            $employee_management_create =intval($processedFormData['employee_management']['create']);
            $employee_management_update =intval($processedFormData['employee_management']['update']);
            $employee_management_delete =intval($processedFormData['employee_management']['delete']);

            $employee_monitoring_view = intval($processedFormData['employee_monitoring']['view']);
            $employee_monitoring_create = intval($processedFormData['employee_monitoring']['create']);
            $employee_monitoring_update = intval($processedFormData['employee_monitoring']['update']);
            $employee_monitoring_delete = intval($processedFormData['employee_monitoring']['delete']);

            $announcement_view = intval($processedFormData['announcement']['view']);
            $announcement_create = intval($processedFormData['announcement']['create']);
            $announcement_update = intval($processedFormData['announcement']['update']);
            $announcement_delete = intval($processedFormData['announcement']['delete']);
            $announcement_archive = intval($processedFormData['announcement']['archive']);
           // Repeat for other checkboxes
    
            $stmt = $this->connect()->prepare('INSERT INTO userlevel 
                (
                    userlevel_name, dashboard_permission_view, admin_management_view, admin_management_create, admin_management_update, admin_management_delete, admin_management_archive, employee_management_view, employee_management_create, employee_management_update, employee_management_delete, employee_monitoring_management_view, employee_monitoring_management_create, employee_monitoring_management_update, employee_monitoring_management_delete, announcement_view, announcement_create, announcement_update, announcement_delete, announcement_archive
                )
                VALUES
                (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )
            ');
    
            if ($stmt->execute([
                $userlevel_name, 
                $dashboard_view, 
                $admin_management_view, 
                $admin_management_create,
                $admin_management_update,
                $admin_management_delete,
                $admin_management_archive,
                $employee_management_view,
                $employee_management_create,
                $employee_management_update,
                $employee_management_delete,
                $employee_monitoring_view, 
                $employee_monitoring_create,
                $employee_monitoring_update,
                $employee_monitoring_delete, 
                $announcement_view,
                $announcement_create,
                $announcement_update,
                $announcement_delete,
                $announcement_archive 
            ])) {
                return true;
            }
    
            return false;
        } catch(PDOException $e) {
            print_r('error: '. $e->getMessage());
        } finally {
            $stmt = null;
        }
    }
    
    
}