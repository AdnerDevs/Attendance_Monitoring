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

    public function getAllAnnouncementServerSide(){
        try{

            $stmt = $this->connect()->prepare("SELECT * FROM announcement WHERE isDeleted != 1");

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

    // insert
    public function insertAnnouncement($announcement_text, $announcement_image, $current_date){
        try{

            $stmt = $this->connect()->prepare('INSERT INTO announcement (announcement_text, announcement_image, date_created)
                VALUES (?,?,?)
            ');

            if($stmt->execute([$announcement_text, $announcement_image, $current_date])){
                return true;
            }

            return false;

        }catch(PDOException $e){
            print_r('Error: ' . $e->getMessage());
        }finally{
            $stmt=null;
        }
    }

    // update

    public function updateAnnouncement($announcement_id, $announcement_text, $announcement_image, $current_date){
        try{
            $stmt = $this->connect()->prepare('UPDATE announcement SET announcement_text = ?, announcement_image = ?, date_created = ?  WHERE announcment_id = ?');

        if($stmt->execute([$announcement_text, $announcement_image, $current_date, $announcement_id])){
            return true;
        }

        return false;

        }catch(PDOException $e){
            print_r('Error: ' . $e->getMessage());
        }finally{
            $stmt=null;
        }
    }

    public function removeAnnouncement($announcement_id){
        try{
            $stmt = $this->connect()->prepare('UPDATE announcement SET isDeleted = 1 WHERE announcment_id = ?');

        if($stmt->execute([$announcement_id])){
            return true;
        }

        return false;

        }catch(PDOException $e){
            print_r('Error: ' . $e->getMessage());
        }finally{
            $stmt=null;
        }
    }

    public function toggleArchive($announcement_id, $isArchive){
        try{
            $stmt = $this->connect()->prepare('UPDATE announcement SET isArchive = ? WHERE announcment_id = ?');

        if($stmt->execute([$isArchive, $announcement_id])){
            return true;
        }

        return false;

        }catch(PDOException $e){
            print_r('Error: ' . $e->getMessage());
        }finally{
            $stmt=null;
        }
    }
    
}