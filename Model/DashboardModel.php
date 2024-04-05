<?php 

class DashboardModel extends Dbh{
    
    public function fetch(){
        try{
            $data = [];
            $stmt = $this->connect()->prepare("SELECT ea.employee_attendance_id, ea.employee_id, ea.employee_name, ac.activity_type, ea.activity_description, ea.start_time, ea.end_time, ea.total_time, ea.submitted_by, ea.submitted_on, dp.department_name, ea.day,  ea.hour, ea.minute, ea.second, lc.credential_id, ea.day, ea.hour, ea.minute, ea.second 
            FROM employee_attendance ea 
            INNER JOIN activity ac ON ea.activity_type = ac.activity_id 
            INNER JOIN department dp ON ea.department_id = dp.department_id
            INNER JOIN login_credentials lc ON ea.employee_id = lc.employee_id
            WHERE ea.isRemove != 1 AND DATE(ea.start_time) = CURRENT_DATE();
            ORDER BY ea.employee_attendance_id DESC");

            if(!$stmt->execute()){
                return false;
           
            }

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        }catch(PDOException $e){
            print('Error: ' .$e->getMessage());
        }finally{
            $stmt = null;
        }
    }

    public function totalEmployees(){
        try {
            $stmt = $this->connect()->prepare("SELECT COUNT(*) as total_employees FROM employee_user WHERE isRemove != 1");

            if (!$stmt->execute()) {
                return false;
            }
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total_employees']; 
        } catch (PDOException $e) {
            print('Error: ' . $e->getMessage());
        } finally {
            $stmt = null;
        }
    }

    public function totalAdmin(){
        try {
            $stmt = $this->connect()->prepare("SELECT COUNT(*) as total_admin FROM admin_user WHERE isRemove != 1 AND isArchive != 1");

            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['total_admin']; 
            }
            return false;
          
        } catch (PDOException $e) {
            print('Error: ' . $e->getMessage());
        } finally {
            $stmt = null;
        }
    }

    public function totalLogon(){
        try {
            $stmt = $this->connect()->prepare("SELECT COUNT(*) as total_logon FROM employee_user WHERE isRemove != 1 AND `status` = 1");

            if (!$stmt->execute()) {
                return false;
            }
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total_logon']; 
        } catch (PDOException $e) {
            print('Error: ' . $e->getMessage());
        } finally {
            $stmt = null;
        }
    }
}
