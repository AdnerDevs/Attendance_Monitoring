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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Document</title>
    <style>
        .navbar-brand{
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
        --text-stroke-color: rgba(255,255,255,0.6);
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
    <header class="navbar navbar-expand-lg bd-navbar p-lg-3 sticky-top navbar-dark bg-dark">
            <nav class="container-fluid bd-gutter flex-wrap flex-lg-nowrap" aria-label="Main Navigation">

                    <?php
                            if(isset($_SESSION["employee_id"]) && $_SESSION["employee_id"]){
                                
                    ?>
                        <a href="dashboard.php" class="navbar-brand animate__animated animate__lightSpeedInRight p-3 fs-5"><!--  style="color: #00FF7F;" -->
                            <button class="button" data-text="Awesome">
                                <span class="actual-text">&nbsp;Herogram&nbsp;</span>
                                <span aria-hidden="true" class="hover-text">&nbsp;Herogram&nbsp;</span>
                            </button>
                        </a>
                        <div class="bd-navbar-toggle">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <?php
                            }else{                       
                    ?>
                        <a href="/attendance_monitoring" class="navbar-brand animate__animated animate__lightSpeedInRight p-3 fs-5">
                            <button class="button" data-text="Awesome">
                                <span class="actual-text">&nbsp;Herogram&nbsp;</span>
                                <span aria-hidden="true" class="hover-text">&nbsp;Herogram&nbsp;</span>
                            </button>
                        </a>

                       
                    <?php
                        }
                    ?>
                  
                    <div class="collapse navbar-collapse" tabindex="-1" id="navbarCollapse" data-bs-scroll="true">

                        <?php
                            if(isset($_SESSION["employee_id"]) && $_SESSION["employee_id"]){
                        ?>
                            <ul class="navbar-nav  me-auto mb-2 mb-lg-0 ">
                                <li class="nav-item">
                                    <a href="dashboard.php" class="nav-link active" aria-current="page">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" aria-current="page">Profile</a>
                                </li>
                              
                                <li class="nav-item">
                                    <button type="button" class="nav-link"><span class="d-lg-none me-2">Notification</span><i class="fa fa-bell" aria-hidden="true"></i></button>
                                    </a>
                                </li>
                            </ul>

                            <ul class="navbar-nav  mb-2 mb-lg-0  align-self-end">
                                <li class="nav-item">
                                    <button type="button" class="btn btn-outline-success" id="logoutBtn" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
                                    <!-- <a href="Controller/logout.php" class="nav-link" aria-current="page"></a> -->
                                </li>
                            </ul>

                        <?php
                            }
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
                    Do you want to logout your account?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="logoutModalBtn" data-bs-employee_id="<?= $_SESSION["employee_id"]?>" >Yes</button>
                </div>
                </div>
            </div>
        </div>  
        <main>

        <script>
            $(document).ready(function(){

                let employee_id;

                $("#logoutModalBtn").click(function(){
                    employee_id = $(this).data('bs-employee_id');

                    logout(employee_id);
                });
            });

            function logout(employee_id){
                $.ajax({
                    type: 'POST',
                    url: 'Controller/logout.php',
                    data:{
                        emp_id: employee_id,  
                    },
                    success: function(response){
                        if(response == 'success'){
                            alert('successfully logout');
                            window.location.href = '../attendance_monitoring';
                        }
                    },
                    error: function (error){
                        console.log(error);
                    }
                });
            }
        </script>