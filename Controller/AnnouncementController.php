<?php 
date_default_timezone_set('Asia/Manila');
$currentDateTime = new DateTime('now');
$current_date = $currentDateTime->format('Y-m-d H:i:s');
require_once("../connection/dbh.php");
require_once("../Model/AnnouncementModel.php");
header('Content-Type: application/json');
header('Content-type: mu');
$announcement_model = new AnnouncementModel();

// $announcement_text = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio beatae aliquam veniam maiores et. Optio, in commodi. Perferendis similique, nam tempore accusamus voluptatibus doloribus tempora ipsum facere temporibus iusto ut?";
// $announcement_image = 'marcus.jpg';

// $insert_announcement = $announcement_model->insertAnnouncement($announcement_text, $announcement_image, $current_date);

// if( $insert_announcement != false ) {
//     echo 'success';
// }else{
//     echo 'failed';
// }
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['fetch_data'])){

        $fetchAll = $announcement_model->getAllAnnouncementServerSide();
        echo json_encode($fetchAll);
    }






    if (isset($_POST['text_sample'])) {
        // Process text data
        $text = htmlspecialchars($_POST['text_sample']);
    
        // Process file data
        $exeception;
        $upload_allowed = true;
        $file_name = '';

        if(isset($_FILES['file_sample'])){
            $file = $_FILES['file_sample'];
            $file_name = $_FILES['file_sample']['name'];
            $file_size = $_FILES['file_sample']['size'];
            $tmp_name = $_FILES['file_sample']['tmp_name'];
            // echo json_encode( $file_size);



            if ($file_size > 49085778) {
                $exeception = "Sorry, your file is too large.";
                echo json_encode(['failed' => $exeception]);
                exit;
            }

            $img_ex = pathinfo($file_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if (!in_array($img_ex_lc, $allowed_exs)) {
                $exeception = "You can't upload files of this type";
                echo json_encode(['failed' => $exeception]);
                exit;
            }

            $img_upload_path = '../asset/upload/' . $file_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            
        }

    
                 
            $upload_announcement = $announcement_model->insertAnnouncement($text, $file_name, $current_date);
        
            if ($upload_announcement !== false) {
                echo json_encode(['success' => $upload_announcement]);
            } else {
                echo json_encode(['failed' => 'error']);
            }
           
    
       
    }

    if(isset($_POST['delete_announcement'])){
        $announcement_id = $_POST['delete_announcement'];

        $remove = $announcement_model->removeAnnouncement($announcement_id);
        if($remove){
            echo json_encode("success");
        }else{
            echo json_encode("failed");
        }
    }
    
    if(isset($_POST['archive_announcement']) && isset($_POST['archive_value'])){
        
        $announcement_id = htmlspecialchars($_POST['archive_announcement'],ENT_QUOTES, 'UTF-8');
        $triggerValue = htmlspecialchars($_POST['archive_value'],ENT_QUOTES, 'UTF-8');

        $archive = $announcement_model->toggleArchive($announcement_id, $triggerValue);

        if($archive != false){
            echo json_encode(['success'=> $archive]);
        }else{
            echo json_encode(['failed' => 'unable to archive']);
        }
    }
}