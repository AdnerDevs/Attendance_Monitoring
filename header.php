<?php
    require_once ('connection/dbh.php');

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
    <link rel="stylesheet" href="asset/css/main.css">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a href="#" class="navbra-brand animate__animated animate__fadeInRight fs-2" style="">
                FiveTwenty
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
    <aside id="sidebar" class="bg-dark">
        <div class="d-flex">
            <button id="toggle-btn" type="button">
                <i class="fa fa-th-large" aria-hidden="true"></i>
             
            </button>
            <div class="sidebar-logo">
                <a href="#">520</a>
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
                    </ul>
            </li>

         

        </ul>

        <div class="sidebar-footer">
            <a href="" class="sidebar-link">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <div class="main p-3 min-vh-100">