<?php
date_default_timezone_set('Asia/Manila');
$currentDateTime = new DateTime('now');
$current_date = $currentDateTime->format('Y-m-d H:i:s');
require_once ("../connection/dbh.php");
require_once ("../Model/AnnouncementModel.php");
require_once ("../Model/EmployeeModel.php");
require_once ("../Model/AlertModel.php");


header('Content-Type: application/json');
header('Content-type: mu');
$announcement_model = new AnnouncementModel();
$employee_model = new EmployeeModel();
$alert_model = new AlertModel();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset ($_POST['fetch_data'])) {

        $fetchAll = $announcement_model->getAllAnnouncementServerSide();
        echo json_encode($fetchAll);
    }

    if (isset ($_POST['fetch_data_front'])) {

        $fetchAll = $announcement_model->getAllAnnouncement();
        echo json_encode($fetchAll);
    }





    if (isset ($_POST['text_sample'])) {
        // Process text data
        $text = $_POST['text_sample'];
        // Process file data
        $file_name = '';

        if (isset ($_FILES['file_sample'])) {
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
            $successResponses = array(); // Array to collect success responses
            
            $get_all_employee_id = $employee_model->getAllEmployees();
            if (is_array($get_all_employee_id)) {
                // Loop through each element
                foreach ($get_all_employee_id as $employee_info) {
                    // Check if the element is an array or an object
                    if (is_array($employee_info) && isset($employee_info['employee_id'])) {
                        $message = "New Announcement has been uploaded, click this to refresh the page.";
                        $employee_id = $employee_info['employee_id'];
                        // Notify each employee
                        $alert_employee_announcement = $alert_model->notifyUpdateAnnouncement($employee_id, $text);
                        // Check if notification is successful
                        if ($alert_employee_announcement !== false) {
                            // Collect success responses
                            $successResponses[] = $employee_id;
                        }
                    }
                }
            }
        
            if (!empty($successResponses)) {
                // If there are any successful notifications, send a success response
                echo json_encode(['success' => $upload_announcement, 'employee_ids' => $successResponses]);
            } else {
                // If no successful notifications, send a general success response
                echo json_encode(['success' => $upload_announcement]);
            }
        } else {
            // If announcement upload fails, send error response
            echo json_encode(['failed' => 'error']);
        }
        

    }

    // update

    if (isset ($_POST['update_announcement_id']) && isset ($_POST['announcement_text']) && isset($_POST['previous_image'])) {
        // && isset($_POST['announcement_image'])

        $announcement_id = htmlspecialchars($_POST['update_announcement_id'], ENT_QUOTES, 'UTF-8');
        $text = $_POST['announcement_text'];
        $file_name = htmlspecialchars($_POST['previous_image'], ENT_QUOTES, 'UTF-8');

        if (isset ($_FILES['update_file'])) {
            $file = $_FILES['update_file'];
            $file_name = $_FILES['update_file']['name'];
            $file_size = $_FILES['update_file']['size'];
            $tmp_name = $_FILES['update_file']['tmp_name'];
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

        $update_announcement = $announcement_model->updateAnnouncement($announcement_id, $text, $file_name, $current_date);

        if ($update_announcement !== false) {
            echo json_encode(['success' => $update_announcement]);
        } else {
            echo json_encode(['failed' => 'error']);
        }


       
    }

    if (isset ($_POST['delete_announcement'])) {
        $announcement_id = $_POST['delete_announcement'];

        $remove = $announcement_model->removeAnnouncement($announcement_id);
        if ($remove) {
            echo json_encode("success");
        } else {
            echo json_encode("failed");
        }
    }

    if (isset ($_POST['archive_announcement']) && isset ($_POST['archive_value'])) {

        $announcement_id = htmlspecialchars($_POST['archive_announcement'], ENT_QUOTES, 'UTF-8');
        $triggerValue = htmlspecialchars($_POST['archive_value'], ENT_QUOTES, 'UTF-8');

        $archive = $announcement_model->toggleArchive($announcement_id, $triggerValue);

        if ($archive != false) {
            echo json_encode(['success' => $archive]);
        } else {
            echo json_encode(['failed' => 'unable to archive']);
        }
    }
}