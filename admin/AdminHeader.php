<?php
//  ob_start(); 
    session_start();
    require_once ('../connection/dbh.php');
    if(isset($_SESSION['admin_id']) && $_SESSION["admin_id"]){

   
?>
<?php
                                    isset($_SESSION['admin_management_view']) && $_SESSION["admin_management_view"] == 1 ? $adminState = " ": $adminState = "d-none";
                                    isset($_SESSION['employee_management_view']) && $_SESSION["employee_management_view"] == 1 ? $empManageState = " ": $empManageState = "d-none";
                                    isset($_SESSION['employee_monitoring_management_view']) && $_SESSION["employee_monitoring_management_view"] == 1 ? $empMonitorState = " ": $empMonitorState = "d-none";
                                    isset($_SESSION['announcement_view']) && $_SESSION["announcement_view"] == 1 ? $announcementState = " ": $announcementState = "d-none";
                                    isset($_SESSION['cms_permission_view']) && $_SESSION["cms_permission_view"] == 1 ? $cmsState = " ": $cmsState = "d-none";

                                                                                                     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="stylesheet" href="../asset/css/main.css">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();

            // new DataTable("#myTable",{
            //     scrollX:true;
            // });
            
        } );
    </script>
</head>
<body>
    <nav class="navbar bg-dark shadow" style="z-index: 3;">
        <div class="container-fluid shadow">
            <a href="/attendance_monitoring/admin" class="navbra-brand animate__animated animate__fadeInRight fs-2" style="color: #00FF7F;">
                <img src="../asset/img/Herogram.jpg" alt="" width="60" class="" style="border-radius: 50% 20% / 10% 40%;">
            </a>

            <ul class="navbar nav">
                <li class="navbar-item">
                    <a href="#" class="navbar-link">
                        <i class="fa fa-bell-o" aria-hidden="true"></i>
                        <span>Notification</span>
                    </a>
                </li>
            </ul>
            
        </div>
    </nav>

    <div class="container-fluid d-flex px-0">
    <aside id="sidebar" class="expand bg-dark">
        <div class="d-flex">
            <button id="toggle-btn" type="button">
                <i class="fa fa-th-large" aria-hidden="true"></i>
             
            </button>
            <div class="sidebar-logo">
                <a href="/attendance_monitoring/admin" >Herogram</a>
            </div>
        </div>
        
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="/attendance_monitoring/admin" class="sidebar-link">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#fileManager" aria-expanded="false" aria-controls="fileManager">
                    <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                    <span>File Manager</span>
                    
                    
                </a>
                <ul id="fileManager" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        
                        <li class="sidebar-item <?=$adminState?>">
                            <a href="AdminAccount.php" class="sidebar-link">
                            <i class="fa fa-address-book" aria-hidden="true"></i>

                                <span class="text-white">Admin</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?=$empManageState?>">
                            <a href="Employee.php" class="sidebar-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="text-white">Employee</span>
                            </a>
                        </li>
                
                        <li class="sidebar-item <?=$empMonitorState?>">
                            <a href="EmployeeMonitoring.php" class="sidebar-link">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="text-white">Employee Monitoring</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="Activity.php" class="sidebar-link">
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                                <span class="text-white">Activity</span>
                            </a>
                        </li>

                        
                        <li class="sidebar-item">
                            <a href="Department.php" class="sidebar-link">
                                <i class="fa fa-bullseye" aria-hidden="true"></i>
                                <span class="text-white">Department</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="Userlevel.php" class="sidebar-link">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                <span class="text-white">Userlevel</span>
                            </a>
                        </li>
                    </ul>
            </li>
            
            <li class="sidebar-item <?=$announcementState?>">
                <a href="Announcement.php" class="sidebar-link">
                    <i class="fa fa-bullhorn" aria-hidden="true"></i>
                    <span>Announcement</span>
                </a>
            </li>
         

        </ul>

        <div class="sidebar-footer">
            <button type="button" class="btn" id="adminlogout">
                <a href="../" class="sidebar-link">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span>Logout</span>
                </a>
            </button>
            
        </div>
    </aside>

    <div class="main p-3 min-vh-100">
        <script>
            $(document).ready(function(){
                $("#adminlogout").click(function(){
                    $.ajax({
                        type: 'POST',
                        url: '../Controller/logout.php',
                        data:{
                            admin: 'admin'
                        },
                        success: function(response){
                            // if(response == 'success'){
                            //     alert('successfully logout');
                            //     window.location.href = '../';
                            // }
                            // console.log(response);
                        },
                        error: function (error){
                            console.log(error);
                        }

                    });
                });
            });
        </script>
<?php
    }else{
        header("location: ../error.php");
        exit();
    }        
?>