<?php
session_start();
require_once ("connection/dbh.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&family=Roboto+Slab:wght@100..900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <title>Document</title>
    <style>
        .navbar-brand {
            font-family: "Roboto Slab", serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }

        /* === removing default button style ===*/
        .button {
            margin: 0;
            height: auto;
            background: transparent;
            padding: 0;
            border: none;
            cursor: pointer;
        }

        /* button styling */
        .button {
            --border-right: 6px;
            --text-stroke-color: rgba(255, 255, 255, 0.6);
            --animation-color: #2545f5;
            --fs-size: 2em;
            letter-spacing: 3px;
            text-decoration: none;
            font-size: var(--fs-size);
            font-family: "Roboto Slab", serif;
            position: relative;
            text-transform: uppercase;
            color: transparent;
            -webkit-text-stroke: 1px var(--text-stroke-color);
        }

        /* this is the text, when you hover on button */
        .hover-text {
            position: absolute;
            box-sizing: border-box;
            content: attr(data-text);
            color: var(--animation-color);
            width: 0%;
            inset: 0;
            border-right: var(--border-right) solid var(--animation-color);
            overflow: hidden;
            transition: 0.5s;
            -webkit-text-stroke: 1px var(--animation-color);
        }

        /* hover */
        .button:hover .hover-text {
            width: 100%;
            filter: drop-shadow(0 0 23px var(--animation-color))
        }
    </style>
</head>

<body>

    <header class="navbar navbar-expand-lg bd-navbar p-lg-3 sticky-top navbar-dark bg-dark shadow">
        <div class="d-flex flex-column position-absolute text-center text-white"
            style="top: 0; left: 0; width: 100%; z-index: 2; height: 30px;">
            <div class="bg-danger"><span class="text-center">ONGOING DEVELOPMENT!!</span></div>
            <div class=" bg-warning"><span class="text-center">COMING SOON!</span></div>
        </div>
        <nav class="container-fluid bd-gutter flex-wrap flex-lg-nowrap" aria-label="Main Navigation">

            <?php
            $link = '/attendance_monitoring';
            $status_display = 'd-none';
            $employee_id;
            $employee_name;
            $department_id;
            $credential_id;

            if (isset($_SESSION["employee_id"]) && $_SESSION["employee_id"]) {

                $link = 'dashboard.php';
                $status_display = '';
                $employee_id = $_SESSION['employee_id'];
                $employee_name = $_SESSION['employee_name'];
                $department_id = $_SESSION['department_id'];
                $credential_id = $_SESSION['credential_id'];
            }

            ?>
            <input type="hidden" name="" id="session_employee_id" value="<?= $employee_id ?>">
            <input type="hidden" name="" id="session_employee_name" value="<?= $employee_name ?>">
            <input type="hidden" name="" id="session_department_id" value="<?= $department_id ?>">
            <input type="hidden" name="" id="session_credential_id" value="<?= $credential_id ?>">
            <a href="<?= $link ?>"
                class="navbar-brand animate__animated animate__lightSpeedInRight p-3 fs-5"><!--  style="color: #00FF7F;" -->
                <button class="button" data-text="Awesome">
                    <span class="actual-text">&nbsp;Herogram&nbsp;</span>
                    <span aria-hidden="true" class="hover-text">&nbsp;Herogram&nbsp;</span>
                </button>
            </a>

            <div class="bd-navbar-toggle <?= $status_display ?>">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse  <?= $status_display ?>" tabindex="-1" id="navbarCollapse"
                data-bs-scroll="true">

                <?php
                #if(isset($_SESSION["employee_id"]) && $_SESSION["employee_id"]){
                ?>
                <ul class="navbar-nav  me-auto mb-2 mb-lg-0 <?= $status_display ?>">
                    <!-- <li class="nav-item">
                                    <a href="dashboard.php" class="nav-link active" aria-current="page">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" aria-current="page">Profile</a>
                                </li> -->

                    <!-- <li class="nav-item">
                                    <button type="button" class="nav-link"><span class="d-lg-none me-2">Notification</span><i class="fa fa-bell" aria-hidden="true"></i></button>
                                    </a>
                                </li> -->
                </ul>

                <ul class="navbar-nav  mb-2 mb-lg-0  align-self-end <?= $status_display ?>">
                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-success" id="logoutBtn" data-bs-toggle="modal"
                            data-bs-target="#logoutModal">Logout</button>
                        <!-- <a href="Controller/logout.php" class="nav-link" aria-current="page"></a> -->
                    </li>
                </ul>

                <?php
                # }
                ?>



            </div>
        </nav>
    </header>


    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="logoutModalLabel">Logout</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout your account?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="logoutModalBtn"
                        data-bs-employee_id="<?= $_SESSION["employee_id"] ?>">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <main>

        <div class="fixed-bottom">
            <div id="liveAlertPlaceholder">
                <!-- Alert content goes here -->
            </div>

        </div>

        <script>
            $(document).ready(function () {
                let session_employee_id = $('#session_employee_id').val();

                // alert(); // You may want to rename this function to avoid conflicts with the built-in alert function
                let pollingInterval;

                alert();
                alertNewAnnouncement();
                function alert() {
                    pollingInterval = setInterval(function () {

                        $.ajax({
                            type: 'POST',
                            url: 'Controller/AlertController.php',
                            data: {
                                employee_id: session_employee_id
                            },
                            dataType: 'json',
                            success: function (result) {
                                if (result != false) {
                                    showNotification(result.employee_id, result.message);
                                    console.log(result.message);
                                }

                            },
                            error: function (xhr, status, error) {
                                console.log(xhr.responseText); // Log the error message
                            }
                        });
                    }, 5000);
                }


                function alertNewAnnouncement() {
                    var pollingInterval = setInterval(function () {
                        $.ajax({
                            type: 'POST',
                            url: 'Controller/AlertController.php',
                            data: {
                                new_announcement_employee_id: session_employee_id
                            },
                            dataType: 'json',
                            success: function (result) {

                                if (result) {

                                    console.log(result);
                                    NotifyNewAnnouncement(result.employee_id, result.message);
                                    clearInterval(pollingInterval);
                                } 
                            },
                            error: function (xhr, status, error) {
                                console.log(xhr.responseText); // Log the error message
                            }
                        });
                    }, 5000);
                }


                function showNotification(id, message) {

                    // console.log('sdsd' + message);
                    if ('Notification' in window) {

                        Notification.requestPermission().then(function (permission) {
                            if (permission === 'granted') {
                                // Create a new notification
                                var notification = new Notification('Alert', {
                                    body: message,
                                    icon: 'asset/img/herogram.jpg',
                                    requireInteraction: true
                                });
                                // Add event listener for the close button
                                notification.onclick = function () {
                                    // // Make AJAX request
                                    $.ajax({
                                        type: 'POST',
                                        url: 'Controller/AlertController.php',
                                        data: {
                                            seen_employee_id: id
                                        },
                                        dataType: 'json',
                                        success: function (result) {
                                            // console.log(result);
                                        },
                                        error: function (xhr, status, error) {
                                            console.log(xhr.responseText); // Log the error message
                                        }
                                    });

                                };
                                // Add event listener for the close event
                                notification.onclose = function () {
                                    // Make AJAX request
                                    $.ajax({
                                        type: 'POST',
                                        url: 'Controller/AlertController.php',
                                        data: {
                                            seen_employee_id: id
                                        },
                                        dataType: 'json',
                                        success: function (result) {
                                            // console.log(result);
                                        },
                                        error: function (xhr, status, error) {
                                            console.log(xhr.responseText); // Log the error message
                                        }
                                    });

                                };
                            }
                        });
                    }
                }

                function NotifyNewAnnouncement(id, message) {

                    // console.log('sdsd' + message);
                    if ('Notification' in window) {

                        Notification.requestPermission().then(function (permission) {
                            if (permission === 'granted') {
                                // Create a new notification
                                var notification = new Notification('Alert', {
                                    body: message,
                                    icon: 'asset/img/herogram.jpg',
                                    requireInteraction: true
                                });
                                // Add event listener for the close button
                                notification.onclick = function () {
                                    // Make AJAX request
                                    $.ajax({
                                        type: 'POST',
                                        url: 'Controller/AlertController.php',
                                        data: {
                                            seen_updated_announcement: id
                                        },
                                        dataType: 'json',
                                        success: function (result) {
                                            // console.log(result);
                                            location.reload();
                                        },
                                        error: function (xhr, status, error) {
                                            console.log(xhr.responseText); // Log the error message
                                        }
                                    });
                                   

                                };
                                // Add event listener for the close event
                                notification.onclose = function () {
                                    // Make AJAX request
                                    $.ajax({
                                        type: 'POST',
                                        url: 'Controller/AlertController.php',
                                        data: {
                                            seen_updated_announcement: id
                                        },
                                        dataType: 'json',
                                        success: function (result) {
                                            // console.log(result);
                                            location.reload();
                                        },
                                        error: function (xhr, status, error) {
                                            console.log(xhr.responseText); // Log the error message
                                        }
                                    });
                                   
                                };
                            }
                        });
                    }
                }

            });
        </script>