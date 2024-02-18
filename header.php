<?php
    session_start();
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Document</title>
</head>
<body>
    <header class="navbar navbar-expand-lg bd-navbar p-lg-3 sticky-top navbar-dark bg-dark">
            <nav class="container bd-gutter flex-wrap flex-lg-nowrap" aria-label="Main Navigation">
                    <a href="/attendance_monitoring" class="navbar-brand" style="color: #00FF7F;">
                        FiveTwenty
                    </a>

                    <div class="bd-navbar-toggle">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" tabindex="-1" id="navbarCollapse" data-bs-scroll="true">

                        <?php
                            if(isset($_SESSION["employee_id"]) && $_SESSION["employee_id"]){
                        ?>
                            <ul class="navbar-nav  me-auto mb-2 mb-lg-0 ">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active" aria-current="page">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" aria-current="page">Profile</a>
                                </li>
                              
                                <li class="nav-item">
                                    <button type="button" class="nav-link"><span class="d-mb-none me-2">Notification</span><i class="fa fa-bell" aria-hidden="true"></i></button>
                                    </a>
                                </li>
                            </ul>

                            <ul class="navbar-nav  mb-2 mb-lg-0  align-self-end">
                                <li class="nav-item">
                                    <a href="Controller/logout.php" class="nav-link" aria-current="page">Logout</a>
                                </li>
                            </ul>

                        <?php
                            }
                        ?>
                          


                    </div>
            </nav>
        </header>

        <main>