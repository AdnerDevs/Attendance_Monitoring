<?php 

class AnnouncementModel extends Dbh{

    public function getAllAnnouncement(){
        try{

            $stmt = $this->connect()->prepare("SELECT * FROM announcement WHERE isDeleted != 1 AND isArchive != 1");

            if(!$stmt->execute()){
                return false;
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        }catch(PDOException $e){
            print_r('Error: ' . $e->getMessage());
        }finally{
            $stmt=null;
        }
    }

    public function insertAnnouncement($announcement_text, $announcement_image, $current_date){
        try{

            $stmt = $this->connect()->prepare('INSERT INTO announcement (announcement_text, announcement_image, date_created)
                VALUES (?,?,?)
            ');

            if(!$stmt->execute([$announcement_text, $announcement_image, $current_date])){
                return false;
            }

            return true;

        }catch(PDOException $e){
            print_r('Error: ' . $e->getMessage());
        }finally{
            $stmt=null;
        }
    }
}