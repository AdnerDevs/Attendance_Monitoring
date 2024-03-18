<?php 
date_default_timezone_set('Asia/Manila');
$currentDateTime = new DateTime('now');
$current_date = $currentDateTime->format('Y-m-d H:i:s');
require_once("../connection/dbh.php");
require_once("../Model/AnnouncementModel.php");
header('Content-Type: application/json');
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

        $fetchAll = $announcement_model->getAllAnnouncement();
        echo json_encode($fetchAll);
    }
}