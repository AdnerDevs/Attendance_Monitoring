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
        $announcement_view, $announcement_create, $announcement_update, $announcement_delete, $announcement_archive, $cms_permission_view, $cms_permission_update
        ){
        try{

            $stmt = $this->connect()->prepare('INSERT INTO userlevel 
            (
                userlevel_name, dashboard_permission_view, admin_management_view, admin_management_create,admin_management_update,admin_management_delete,admin_management_archive, employee_management_view, employee_management_create, employee_management_update, employee_management_delete, employee_monitoring_management_view, employee_monitoring_management_create, employee_monitoring_management_update, employee_monitoring_management_delete, announcement_view, announcement_create, announcement_update, announcement_delete, announcement_archive, cms_permission_view, cms_permission_update

            )
            VALUES
            (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )
            ');


            if(!$stmt->execute([
                $userlevel_name, 
                $dashboard_permission_view, $admin_management_view, $admin_management_create,$admin_management_update,$admin_management_delete,$admin_management_archive, 
                $employee_management_view, $employee_management_create, $employee_management_update, $employee_management_delete, 
                $employee_monitoring_management_view, $employee_monitoring_management_create, $employee_monitoring_management_update, $employee_monitoring_management_delete, 
                $announcement_view, $announcement_create, $announcement_update, $announcement_delete, $announcement_archive, $cms_permission_view, $cms_permission_update
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
}