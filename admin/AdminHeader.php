<?php
    require_once ('../connection/dbh.php');

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
    
</head>
<body>
    <nav class="navbar bg-dark">
        <div class="container-fluid">
            <a href="#" class="navbra-brand animate__animated animate__fadeInRight fs-2" style="color: #00FF7F;">
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
                <a href="#" >Herogram</a>
            </div>
        </div>
        
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
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
                        
                        <li class="sidebar-item">
                            <a href="AdminAccount.php" class="sidebar-link">
                            <i class="fa fa-address-book" aria-hidden="true"></i>

                                <span class="text-white">Admin</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="Employee.php" class="sidebar-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="text-white">Employee</span>
                            </a>
                        </li>
                
                        <li class="sidebar-item">
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
            
            <li class="sidebar-item">
                <a href="Announcement.php" class="sidebar-link">
                    <i class="fa fa-bullhorn" aria-hidden="true"></i>
                    <span>Announcement</span>
                </a>
            </li>
         

        </ul>

        <div class="sidebar-footer">
            <a href="../" class="sidebar-link">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <div class="main p-3 min-vh-100">