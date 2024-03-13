<?php 

class AlertModel extends Dbh{
    public function fetch($employee_id){
        try {
            $stmt = $this->connect()->prepare("SELECT * FROM `notification` WHERE employee_id = ? AND isSeen = 0");
            // $stmt->bindParam(1, $employee_id, PDO::PARAM_INT);
            $s = true;
            if(!$stmt->execute([$employee_id])){
                // Handle query execution failure
                $s = false;
                return $s;
            }
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $result;
    
        } catch (PDOException $e) {
            // Handle exception
            echo 'Error fetching latest notification: ' . $e->getMessage();
            return false;
        } finally {
            $stmt = null;
        }
    }
    

    // insert
    public function notifyEmployee($employee_id){
        try{
            $stmt = $this->connect()->prepare('INSERT INTO `notification` (employee_id) VALUES (?) ');
            if(!$stmt->execute([$employee_id])){
                return false;
            }

            return true;
        }catch (PDOException $e) {
            echo 'Error inserting attendance: ' . $e->getMessage();
            return false;
        } finally {
            $stmt = null;
        }
    }

    // update

    public function updateNotification($employee_id){
        try{
            $stmt = $this->connect()->prepare('UPDATE `notification` SET isSeen = 1 WHERE employee_id = ?');
            if(!$stmt->execute([$employee_id])){
                return false;
            }

            return true;
        }catch (PDOException $e) {
            echo 'Error inserting attendance: ' . $e->getMessage();
            return false;
        } finally {
            $stmt = null;
        }
    }
}