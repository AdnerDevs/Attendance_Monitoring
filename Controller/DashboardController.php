<?php 

require_once('../connection/dbh.php');
require_once ('../Model/DashboardModel.php');
header('Content-Type: application/json');

$dashboard_model = new DashboardModel();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    

    if(isset($_POST['get_data'])){

        $get_current_data = $dashboard_model->fetch();
    
        echo json_encode($get_current_data);
        // echo json_encode('connected');

    }

    if(isset($_POST['total_emp'])){
        $get_total_employees = $dashboard_model->totalEmployees();
        $get_total_admin = $dashboard_model->totalAdmin();
        $get_total_logon_employees = $dashboard_model->totalLogon();
        $array = [
            'tl'=> $get_total_employees,
            'ta' => $get_total_admin,
            'lg' => $get_total_logon_employees
        ];
        echo json_encode(['data' => $array]);
  
    }
}