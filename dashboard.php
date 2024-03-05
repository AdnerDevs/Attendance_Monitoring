<?php
ob_start();
require_once('header.php');
date_default_timezone_set('Asia/Manila');
$current_time = new DateTime('now', new DateTimeZone('UTC'));
$current_time->setTimezone(new DateTimeZone('Asia/Manila'));
require_once('Model/AnnouncementModel.php');
require_once('Model/ActivityModel.php');
$announcement_model = new AnnouncementModel();
$activity_model = new ActivityModel();
$input_value = $current_time->format('Y-m-d\TH:i');
if (isset($_SESSION["employee_id"]) && $_SESSION["employee_id"]) {
    ?>
    <style>
        .header {
            position: relative;
            letter-spacing: 3px;

            cursor: pointer;

        }

        #header-title {

            color: transparent;
            -webkit-text-stroke: 1px rgb(0, 0, 0, .5);

        }

        #hover-title {
            position: absolute;
            inset: 0;
            width: 0%;
            color: #fe21a2;
            overflow: hidden;
            border-right: 6px solid #fe21a2;
            transition: 0.5s ease-in-out;
        }

        .header.hover #hover-title {
            width: 50%;
            filter: drop-shadow(0 0 40px #fe21a2);
        }


        .flip-box {
            transform-style: preserve-3d;
            perspective: 1000px;
            cursor: pointer;
        }

        .flip-box2 {
            transform-style: preserve-3d;
            perspective: 1000px;
            cursor: pointer;
        }


        .flip-box-front,
        .flip-box-back {
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            min-height: 475px;
            transition: 0.7s cubic-bezier(.4, .2, .2, 1);
            backface-visibility: hidden;

        }

        .flip-box-front {
            transform: rotate(0deg);
            transform-style: preserve-3d;

        }



        .flip-box.hover .flip-box-front {
            transform: rotateY(-180deg);
            transform-style: preserve-3d;

        }

        .flip-box2.hover .flip-box-front {
            transform: rotateY(-180deg);
            transform-style: preserve-3d;

        }


        .flip-box-back {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            transform: rotateY(180deg);
            transform-style: preserve-3d;

            /* box-shadow: 0px 0px 5px #fb5fba,
        0px 0px 30px #fb5fba,
        0px 0px 90px #fb5fba; */
        }

        .flip-box-back::before {
            border-radius: 8px;
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            background-color: rgba(126, 116, 125, 0.5);
            /* Dark overlay color */
            backdrop-filter: blur(2px);
            /* Apply blur effect */
        }

        .flip-box.hover .flip-box-back {
            transform: rotateY(0deg);
            transform-style: preserve-3d;
        }

        .flip-box2.hover .flip-box-back {
            transform: rotateY(0deg);
            transform-style: preserve-3d;
        }

        .flip-box .inner {
            position: absolute;
            left: 0;
            width: 100%;

            outline: 1px solid transparent;
            perspective: inherit;
            z-index: 2;
            transform: translateY(-50%)translateZ(60px) scale(.94);
            top: 50%;

        }

        .flip-box2 .inner {
            position: absolute;
            left: 0;
            width: 100%;

            outline: 1px solid transparent;
            perspective: inherit;
            z-index: 2;
            transform: translateY(-50%)translateZ(60px) scale(.94);
            top: 50%;

        }


        @media (max-width: 992px) {
            .header.hover #hover-title {
                width: 65%;

            }
        }

        @media (max-width: 937px) {
            .header.hover #hover-title {
                width: 70%;

            }
        }

        @media (max-width: 935px) {
            .header.hover #hover-title {
                width: 60%;

            }
        }


        @media (max-width: 768px) {
            .header:hover #hover-title {
                width: 80%;

            }
        }

        @media (max-width: 422px) {
            .header:hover #hover-title {
                width: 100%;

            }
        }

        .box-item1 {

            transition: width 2s ease-in-out;
            transition: width 2s ease-in-out, opacity 3s ease-in-out;
            width: 100%;

        }
        .box-item1.active{
            width: 50%;
        }

        .box-item1.hover {
            width: 0px;
            padding: 0;
            pointer-events: none;
            opacity: 0;
            transition: all 2s ease-in-out;
        }

        .box-item1.hover button {
            display: none;
        }

        

        .box-item {
            width: 0;
            opacity: 0;
            padding: 0;
            transition: all 2s ease-in-out;
           
        }

        .box-item.active{
            width:50%;
            opacity: 1;
            padding: 0.5 rem;
        }

        .box-item.click {
            width: 97%;
        }
    </style>
    <style>

    </style>
    <style>
        .loader {
            text-align: center;
            position: relative;
            display: flex;
        }

        .loader .ball {
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
        }

        .ball {
            display: block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: radial-gradient(circle at 8px 5px, white 5%, black);
            position: relative;
            transform-origin: 50% -100px;
        }

        .ball:last-child {
            animation: balance-right 1.2s infinite linear;
        }

        .ball:first-child {
            animation: balance-left 1.2s infinite linear;
        }

        @keyframes balance-right {
            0% {
                transform: rotate(0deg);
                animation-timing-function: linear;
            }

            50% {
                transform: rotate(0deg);
                animation-timing-function: ease-out;
            }

            75% {
                transform: rotate(-30deg);
                animation-timing-function: ease-in;
            }
        }

        @keyframes balance-left {
            0% {
                transform: rotate(0deg);
                animation-timing-function: ease-out;
            }

            25% {
                transform: rotate(30deg);
                animation-timing-function: ease-in;
            }

            50% {
                transform: rotate(0deg);
                animation-timing-function: linear;
            }
        }
    </style>
    <!-- btn start -->
    <style>
        .shadow__btn {
            padding: 10px 20px;
            border: none;
            font-size: 17px;
            color: #fff;
            border-radius: 7px;
            letter-spacing: 4px;
            font-weight: 700;
            text-transform: uppercase;
            transition: 0.5s;
            transition-property: box-shadow;
        }

        .shadow__btn {
            background: rgb(0, 140, 255);
            box-shadow: 0 0 25px rgb(0, 140, 255);
        }

        .shadow__btn:hover {
            box-shadow: 0 0 5px rgb(0, 140, 255),
                0 0 25px rgb(0, 140, 255),
                0 0 50px rgb(0, 140, 255),
                0 0 100px rgb(0, 140, 255);
        }
    </style>
    <!-- css animated text -->
    <style>
        .tracking-in-expand {
            -webkit-animation: tracking-in-expand 0.7s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
            animation: tracking-in-expand 0.7s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
            text-shadow: 4px 2px 0px rgba(162,146,146,0.57); background: rgba(177, 178, 241, 0.31);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(1.5px);
            -webkit-backdrop-filter: blur(1.5px);
            border: 1px solid rgba(177, 178, 241, 0.46);
        }

        @-webkit-keyframes tracking-in-expand {
            0% {
                letter-spacing: -0.5em;
                opacity: 0;
            }

            40% {
                opacity: 0.6;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes tracking-in-expand {
            0% {
                letter-spacing: -0.5em;
                opacity: 0;
            }

            40% {
                opacity: 0.6;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
    <link rel="stylesheet" href="asset/css/infiniteLoop.css">
    <div class="container-fluid min-vh-100 mt-0" style="background-image: url('asset/img/bg_msa.jpg');  background-size: cover;
    background-position: center; background-repeat: no-repeat; ">

        <div class="row " >
            <p class="h4 text-center fs-1 tracking-in-expand text-white p-2 shadow "><i class="fa fa-bullhorn" aria-hidden="true" style="transform: rotateY(180deg);"></i> Announcement <i class="fa fa-bullhorn" aria-hidden="true"></i></p>
            <div class="scroller" data-speed="slow" data-direction="left">
                <ul class="tag-list scroller__inner p-0 d-flex gap-2 py-2 flex-wrap ">
                    <?php
                    $announcement = $announcement_model->getAllAnnouncement();

                    for ($i = 0; $i < count($announcement); $i++):
                        $announce = $announcement[$i];
                        ?>
                        <li class="scroll-li" style="max-width: 20%;">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row ">
                                        <div class="col-md-1 text-center">
                                            <img src="asset/img/<?= $announce['announcement_image'] ?>" class="img-fluid" alt=""
                                                height="100">
                                        </div>
                                        <div class="col-md-11 lh-base">
                                            <?= $announce['announcement_text'] ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <?php
                    endfor;
                    ?>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="box-item1 col-md-6 mb-4" id="attendna">
                    <div class="flip-box">
                        <div class="flip-box-front p-2 text-center"
                            style="background-image: url('asset/img/a.jpg'); border-image: fill 0 linear-gradient(#0001, #000);">
                            <p class="h3 flip-box-header text-white  border-bottom p-4">Attendance</p>
                            <div class="inner text-white">
                                <!-- <button type="button" id="switch" class="btn btn-primary">Start time</button> -->

                                <button class="shadow__btn" id="switch">
                                    Start time
                                </button>

                            </div>
                        </div>
                        <div class="flip-box-back text-center" style="background-image: url('asset/img/marcus.jpg'); ">
                            <div class="inner text-white">

                                <div class="row">
                                    <div class="co-12 mb-4 ">
                                        <p class="h3 flip-box-header">Attendance</p>
                                        <div class="timer-container border-top p-2">
                                            <div id="timer" class="timers">00:00:00</div>
                                            <button id="endAttendance" class="btn btn-danger">End time</button>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-12 mb-4 d-flex justify-content-center">

                                    <div class="loader">
                                        <span class="ball ball1"></span>
                                        <span class="ball"></span>
                                        <span class="ball"></span>
                                        <span class="ball"></span>
                                        <span class="ball"></span>
                                    </div>

                                </div>

                                <div class="col-12 table-responsive" style="max-height: 300px;">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-item col-md-6 mb-4">
                    <div class="flip-box2">

                        <div class="flip-box-front text-center p-2"
                            style="background-image: url('asset/img/a.jpg'); border-image: fill 0 linear-gradient(#0001, #000);">
                            <p class="h3 flip-box-header text-white  border-bottom p-4">Activity </p>
                            <div class="inner text-white p-4">

                                <div class="input-group mb-2">
                                    <select class="form-select" aria-label=" select example" id="activity_type">
                                        <?php
                                                $get_act = $activity_model->getAllActivity();

                                                for ($i = 0; $i < count($get_act); $i++):
                                                    if($get_act[$i]['activity_id'] === 1){ 
                                                        continue;
                                                    }
                                            ?>
                                           
                                        <option value="<?=$get_act[$i]['activity_id']?>"><?=$get_act[$i]['activity_type']?></option>
                                            <?php
                                                endfor;
                                            ?>
                                    </select>
                                    <button type="button" id="switch2" class="btn btn-primary">Start time</button>
                                </div>
                                
                                <label for="basic-url" class="form-label">Description</label>
                             
                                <textarea class="form-control" aria-label="With textarea" id="activity_description"></textarea>
                              

                            </div>
                        </div>
                        <div class="flip-box-back text-center" style="background-image: url('asset/img/marcus.jpg')">
                            <div class="inner text-white">

                                <div class="row">
                                    <div class="co-12 mb-4 ">
                                        <p class="h3 flip-box-header">Activity</p>
                                        <div class="timer-container border-top p-2">
                                            <div id="timer2" class="timer">00:00:00</div>
                                            <button id="back2" class="btn btn-danger">End time</button>
                                            <input type="hidden" name="" id="hidden_activity_type">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-4 d-flex justify-content-center">

                                    <div class="loader">
                                        <span class="ball ball1"></span>
                                        <span class="ball"></span>
                                        <span class="ball"></span>
                                        <span class="ball"></span>
                                        <span class="ball"></span>
                                    </div>

                                </div>

                                <div class="col-12 table-responsive" style="max-height: 300px;">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>sa</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>

                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-none">
        <div class="col-md-6 p-4">
            <p class="text-center fs-1">Attendance</p>

            <div class="input-group mb-3">
                <input type="datetime-local" class="form-control" value="<?= $input_value ?>"
                    placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button type="button" class="input-group-text bg-dark text-white" id="basic-addon2">Start time</button>
            </div>
            <div class="input-group mb-3">

                <select class="form-select" aria-label="Default select department">
                    <option value="0" selected disabled>Acivity</option>
                    <?php

                    for ($i = 0; $i < 5; $i++):
                        ?>
                        <option value="">sample act</option>
                        <?php
                    endfor;
                    ?>
                </select>
                <span class="input-group-text">
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                </span>
            </div>

        </div>
        <div class="col-md-6 p-4">
            <p class="text-center fs-1">Activity</p>
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function () {
            const scrollers = document.querySelectorAll(".scroller");

            if (!window.matchMedia("(prefers-redueced-motion: reduce)").matches) {
                addAnimation();
            }

            function addAnimation() {
                scrollers.forEach((scroller) => {
                    scroller.setAttribute('data-animated', true);

                    const scrollerInner = scroller.querySelector('.scroller__inner');

                    const scrollerContent = Array.from(scrollerInner.children);

                    scrollerContent.forEach(item => {
                        const duplicatedItem = item.cloneNode(true);
                        duplicatedItem.setAttribute('aria-hidden', true);
                        scrollerInner.appendChild(duplicatedItem);

                    })
                });
            }

            let session_employee_id = $('#session_employee_id').val();
            let session_employee_name = $('#session_employee_name').val();
            let session_department_id = $('#session_department_id').val();
            let session_credential_id = $('#session_credential_id').val();
            // let activity__type;
            let activityy__description;
            let timer;
            let seconds = 0;
            let secondsAct = 0;

            function startTimer() {
                timer = setInterval(displayTime, 1000);
                activity__type = "1";
                activityy__description = "Attendance";
                // $.ajax({
                //     type: 'POST',
                //     url: 'Controller/AttendanceController.php',
                //     data: {
                //         employee_id: session_employee_id,
                //         employee_name: session_employee_name,
                //         department_id: session_department_id,
                //         credential_id: session_credential_id,
                //         activity_type: activity__type,
                //         activity_description: activityy__description
                //     },
                //     dataType: 'json',
                //     success: function (result) {

                //         if (result.status === 'success') {
                //             alert('Starting Attendance');
                //         } else {
                //             alert('Failed to start Attendance');
                //         }
                //     },
                //     error: function (error) {
                //         console.log(error);
                //     }
                // });


            }

            function startTimerActivity() {
                timer = setInterval(displayTimeActivity, 1000);
                activity__type = $('#activity_type').val();
                activityy__description = $('#activity_description').val();
                // console.log({
                //     activity_type,activity_description
                // });
                // $.ajax({
                //     type: 'POST',
                //     url: 'Controller/AttendanceController.php',
                //     data: {
                //         employee_id: session_employee_id,
                //         employee_name: session_employee_name,
                //         department_id: session_department_id,
                //         credential_id: session_credential_id,
                //         activity_type: activity__type,
                //         activity_description: activityy__description
                        
                //     },
                //     dataType: 'json',
                //     success: function (result) {
                        
                //         if (result.status === 'success') {
                //             alert("Starting Activity");
                //             let m = result.data.submitted_by;
                //             $('#back2').val(m);
                      
                //         } else {
                //             alert('Failed to start Attendance');
                //         }
                
                //     },
                //     error: function (error) {
                //         console.log(error);
                //     }
                // });

            }

            function getSeconds() {
                alert('Seconds: ' + seconds);
                $.ajax({
                    type: 'POST',
                    url: 'Controller/AttendanceController.php',
                    data: {
                        employee_id: session_employee_id,
                        total_seconds: seconds
                    },
                    dataType: 'json',
                    success: function (result) {
                        if (result.status === 'success') {
                            alert('Ended Attendance');
                        } else {
                            alert('Failed to end Attendance');
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
                seconds = 0;
                clearInterval(timer);


            }

            function getSecondsAct(){
                alert('Seconds: ' + secondsAct);
                secondsAct = 0;
                clearInterval(timer);
          
            }

            function displayTime() {

                seconds++;

                let hours = Math.floor(seconds / 3600);
                let minutes = Math.floor(seconds % 3600 / 60);
                let secs = seconds % 60;

                document.getElementById("timer").innerHTML =
                    (hours < 10 ? "0" : "") + hours + ":" +
                    (minutes < 10 ? "0" : "") + minutes + ":" +
                    (secs < 10 ? "0" : "") + secs;
            }

            function displayTimeActivity() {

            secondsAct++;

            let hours = Math.floor(secondsAct / 3600);
            let minutes = Math.floor(secondsAct % 3600 / 60);
            let secs = secondsAct % 60;

                document.getElementById("timer2").innerHTML =
                (hours < 10 ? "0" : "") + hours + ":" +
                (minutes < 10 ? "0" : "") + minutes + ":" +
                (secs < 10 ? "0" : "") + secs;
            }

            function getTime(time) {
                console.log(time);
            }


            let isActionRunning = false;

            if (localStorage.getItem('isCardFlipped') === 'true') {

                $('.flip-box').addClass('hover');

            }

            if (localStorage.getItem('isCardFlipped2') === 'true') {

                $('.flip-box2').addClass('hover');
                $('.box-item1').addClass('hover');
                $('.box-item').addClass('click');

            }

            $("#switch").click(function () {
                isActionRunning = true;
                startTimer();
                $('.flip-box').toggleClass('hover');
                $('.header').toggleClass('hover');
                $('.box-item').addClass('active');
                $('.box-item1').addClass('active');
                localStorage.setItem('isCardFlipped', $('.flip-box').hasClass('hover'));


            });


            $("#endAttendance").click(function () {
                isActionRunning = false;
                getSeconds();
                $('.flip-box').removeClass('hover');
                $('.header').removeClass('hover');
                $('.box-item1').removeClass('active');
                $('.box-item').removeClass('active');
                localStorage.setItem('isCardFlipped', $('.flip-box').hasClass('hover'));
            });


            $("#switch2").click(function () {
                isActionRunning = true;

                $('.flip-box2').addClass('hover');
                $('.header').addClass('hover');
                $('.box-item1').addClass('hover');
                $('.box-item').addClass('click');
                localStorage.setItem('isCardFlipped2', $('.flip-box2').hasClass('hover'), $('box-item1').hasClass('hover'));

           

                startTimerActivity();

            });
            $("#back2").click(function () {
                isActionRunning = false;
                $('.flip-box2').removeClass('hover');
                $('.header').removeClass('hover');
                $('.box-item1').removeClass('hover');
                $('.box-item').removeClass('click');
                localStorage.setItem('isCardFlipped2', $('.flip-box2').hasClass('hover'));
                let s = $("#back2").val();
                console.log("result" + s);
                getSecondsAct();
             
            });


            $(window).on('beforeunload', function () {
                if (isActionRunning) {
                    return 'You have an action currently running on this page. Are you sure you want to leave?';
                }
            });

            console.log('s');

        });
    </script>
    <?php
} else {
    header("location: error.php");
    exit();
}
?>

<?php
require_once('footer.php');
ob_end_flush();

?>