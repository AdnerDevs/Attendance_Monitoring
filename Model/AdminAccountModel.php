<?php 

class AdminAccountModel extends Dbh{

    public function getAllAdmin(){
        try{
            $stmt = $this->connect()->prepare("SELECT au.admin_id, au.admin_name, ul.userlevel_name, au.isRemove, au.isArchive, lc.credential_surname  
            FROM admin_user au
            INNER JOIN userlevel ul ON au.userlevel_id = ul.userlevel_id
            INNER JOIN login_credentials lc ON au.admin_id = lc.employee_id
            WHERE isRemove != 1");

            if(!$stmt->execute()){
                return false;
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        }catch(PDOException $e){
            print_r($e->errorInfo);
        }finally{
            $stmt = null;
        }
    }

    public function registerAdmin($admin_id, $admin_username, $admin_completename, $userlevel, $usertpye){
        try{    
            $stmt = $this->connect()->prepare("INSERT INTO admin_user (admin_id,  admin_name, userlevel_id) VALUES (?,?,?)");

            if(!$stmt->execute([$admin_id,$admin_completename,$userlevel])){
                return false;
            }

            $perform = $this->createLoginCredentials($admin_id, $admin_id, $admin_username, $usertpye ) ;

            if( $perform  != false){
                return true;
            }else{
                return false;
            }

        }catch(PDOException $e){
            print_r($e->errorInfo);
        }finally{
            $stmt = null;
        }
    }

    public function createLoginCredentials($admin_id, $id_credentials, $admin_username, $usertpye ){
        try{

            $stm = $this->connect()->prepare('INSERT INTO login_credentials (employee_id, credential_id, credential_surname, user_type) VALUES (?,?,?,?)');

            if(!$stm->execute([$admin_id, $id_credentials, $admin_username, $usertpye])){
                return false;
            }

            return true;

        }catch(PDOException $e){
            print('' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }

    public function checkID($admin_id){
        try{
            $stmt = $this->connect()->prepare('SELECT admin_id FROM admin_user WHERE admin_id = ? AND isRemove != 1 AND isArchive != 1');
            $stmt->execute([$admin_id]);
            
            $result = ($stmt->rowCount()>0) ? false : true;
            return $result;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
            return false;
        }finally{
            $stmt = null;
        }
    }
}