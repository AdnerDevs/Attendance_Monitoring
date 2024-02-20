<?php

require_once ('../connection/dbh.php');
require_once ('../Model/DepartmentModel.php');

$department_model = new DepartmentModel();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['department_name'])){
        $dept_name = htmlspecialchars($_POST['department_name'], ENT_QUOTES, 'UTF-8');

        $insertDept = $department_model->insertDepartment($dept_name);
        
        if($insertDept != false){
            echo "success";
        }else{
            echo 'failed';
            die();
        }
    }

    if(isset($_POST["edit_department"]) && isset( $_POST["edit_department_id"])){
        $dept_name = htmlspecialchars($_POST["edit_department"], ENT_QUOTES, 'UTF-8');
        $dept_id = htmlspecialchars($_POST["edit_department_id"], ENT_QUOTES, 'UTF-8');
        
        $editDept = $department_model->updateDepartment($dept_name, $dept_id);

        if($editDept !== false){
            echo "success";
        }else{
            echo "failed";
            die();
        }
    }

    if(isset( $_POST["archive_dept_id"]) && isset( $_POST["archive_dept_value"])){
        
        $dept_id = htmlspecialchars($_POST["archive_dept_id"], ENT_QUOTES, 'UTF-8');
        $archive_value = htmlspecialchars($_POST['archive_dept_value'], ENT_QUOTES, 'UTF-8');

        $archiveDept = $department_model->archiveDepartment($archive_value, $dept_id);

        if($archiveDept !== false){
            echo "success";
        }else{
            echo "failed";
            die();
        }
       
    }

    
    if(isset( $_POST["delete_dept_id"])&& isset( $_POST["delete_dept_value"])){
        
        $dept_id = htmlspecialchars($_POST["delete_dept_id"], ENT_QUOTES, 'UTF-8');
        $delete_value = htmlspecialchars($_POST["delete_dept_value"], ENT_QUOTES, 'UTF-8');

        $deleteDept = $department_model->deleteDepartment($delete_value, $dept_id);

        if($deleteDept !== false){
            echo "success";
        }else{
            echo "failed";
            die();
        }
    }
}