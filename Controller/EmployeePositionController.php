<?php

require_once ('../connection/dbh.php');
require_once ('../Model/EmployeePositionModel.php');
header('Content-Type: application/json');

$position_model = new EmployeePositionModel();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['get_all'])){
        $getall = $position_model->getAllPositions();
        if(!empty($getall)){
            echo json_encode($getall);
        }
 
    }

    if(isset($_POST['name'])){

        $job_pos = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');

        $insert = $position_model->insertPosition($job_pos);

        if ($insert != false) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'failed']);

        }

    }


// update
    if(isset($_POST['edit_name']) && isset($_POST['id'])){
        $job_pos = htmlspecialchars($_POST['edit_name'], ENT_QUOTES, 'UTF-8');
        $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');

        $update = $position_model->updatePosition($job_pos, $id);

        if ($update != false) {
            echo json_encode(['status' => 'success']);

        } else {
            echo json_encode(['status' => 'failed']);
    
        }

    }


    if(isset($_POST['is_archive']) && isset($_POST['id'])){
        $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
        $archive_value = htmlspecialchars($_POST['is_archive'], ENT_QUOTES, 'UTF-8');
        
        $toggleArchive = $position_model-> archivePosition($archive_value, $id);

        if($toggleArchive != false){
            echo json_encode($toggleArchive);
        }else{
            echo json_encode('false');
        }
        // echo json_encode('connected');
    }

    if(isset($_POST['is_remove'])){
        $id = htmlspecialchars($_POST['is_remove'], ENT_QUOTES, 'UTF-8');

        $remove = $position_model->deletePosition($id);

        if($remove != false){
            echo json_encode($remove);
        }else{
            echo json_encode('false');
        }
    }

}