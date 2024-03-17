<?php 

class AdminAccountModel extends Dbh{

    public function getAllAdmin(){
        try{
            $stmt = $this->connect()->prepare("SELECT au.admin_id, au.admin_name, ul.userlevel_name, au.isRemove, au.isArchive, lc.credential_surname, au.status , au.userlevel_id
            FROM admin_user au
            INNER JOIN userlevel ul ON au.userlevel_id = ul.userlevel_id
            INNER JOIN login_credentials lc ON au.admin_id = lc.employee_id
            WHERE au.isRemove != 1");

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

    public function getAdminById($admin_id){
        try{
            $stmt = $this->connect()->prepare("SELECT au.admin_id, au.admin_name, ul.userlevel_name, au.isRemove, au.isArchive, lc.credential_surname, au.status, au.userlevel_id  
            FROM admin_user au
            INNER JOIN userlevel ul ON au.userlevel_id = ul.userlevel_id
            INNER JOIN login_credentials lc ON au.admin_id = lc.employee_id
            WHERE au.admin_id = ? AND au.isRemove != 1");

            if(!$stmt->execute([$admin_id])){
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


    // insert
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

    // update

    public function updateAdmin( $admin_completename, $admin_username, $userlevel, $admin_id){
        try{    
            $stmt = $this->connect()->prepare("UPDATE admin_user SET admin_name = ?, userlevel_id = ? WHERE admin_id = ?");

            if(!$stmt->execute([ $admin_completename, $userlevel, $admin_id])){
                return false;
            }

            $perform = $this->updateLoginCredentials($admin_id, $admin_username) ;

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

    public function updateLoginCredentials($admin_id, $admin_username){
        try{

            $stmt = $this->connect()->prepare('UPDATE login_credentials SET credential_surname = ? WHERE employee_id = ?');

            if(!$stmt->execute([$admin_username, $admin_id])){
                return false;
            }

            return true;

        }catch(PDOException $e){
            print('' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }


    public function removeAdmin($admin_id){
        try{

            $stmt = $this->connect()->prepare('UPDATE admin_user SET isRemove = 1 WHERE admin_id = ?');
            $stmt2 = $this->connect()->prepare('UPDATE login_credentials SET isRemove = 1 WHERE employee_id = ?');
            if(!$stmt->execute([$admin_id])){
                return false;
            }
            if(!$stmt2->execute([$admin_id])){
                return false;
            }

            return true;

        }catch(PDOException $e){
            print('' .$e->getMessage());
        }finally{
            $stmt = null;
            $stmt2 = null;
        }
    }

    public function restrictAdmin($admin_id, $value){
        try{

            $stmt = $this->connect()->prepare('UPDATE admin_user SET isArchive = ? WHERE admin_id = ?');
 
            if(!$stmt->execute([$value, $admin_id ])){
                return false;
            }
          

            return true;

        }catch(PDOException $e){
            print('' .$e->getMessage());
        }finally{
            $stmt = null;
          
        }
    }
}