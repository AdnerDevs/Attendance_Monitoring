<?php
ob_start();
require_once('header.php');
date_default_timezone_set('Asia/Manila');
$current_time = new DateTime('now', new DateTimeZone('UTC'));
$current_time->setTimezone(new DateTimeZone('Asia/Manila'));
// require_once('Model/AnnouncementModel.php');
require_once('Model/ActivityModel.php');
// $announcement_model = new AnnouncementModel();
$activity_model = new ActivityModel();
$input_value = $current_time->format('Y-m-d\TH:i');
if (isset($_SESSION["employee_id"]) && $_SESSION["employee_id"]) {
?>

    <link rel="stylesheet" href="asset/css/infiniteLoop.css">
    <link rel="stylesheet" href="asset/css/dashboard.css">
    <link rel="stylesheet" href="asset/css/btnStartAnimation.css">
    <link rel="stylesheet" href="asset/css/ballAnimation.css">
    <link rel="stylesheet" href="asset/css/sliding.css">
    <link rel="stylesheet" href="./asset/css/quote.css">
    <link rel="stylesheet" href="./asset/css/FontStyleDashboard.css">
    <link rel="stylesheet" href="./asset/css/AnnouncementText.css">
    <style>

    </style>
  <style>

#txt{
   display:flex;
   align-items:center;
   justify-content:center;
   flex:1;
   font-family:sans-serif;
   letter-spacing:3.5px;
   font-size:3.5rem;
   font-weight:700;
   position:relative;
   transform-style:preserve-3d;
   perspective:100px;
   -webkit-transform-style:preserve-3d;
   -webkit-perspective:100px;
}
#txt>b{
   height:3.5rem;
   box-shadow:0 .4rem .3rem -.3rem #aaa;
   color:#979c9f;
   background:linear-gradient(#aaf,#acf,#afc);
   background-clip:text;
   text-fill-color:transparent;
   -webkit-background-clip:text;
   -webkit-text-fill-color:transparent;
   transform-origin:bottom;
   transform:rotateX(-85deg);
   -webkit-transform-origin:bottom;
   -webkit-transform:rotateX(-85deg);
   animation:getUp 7s infinite;
}
#txt>b:nth-child(2){
   animation-delay:.25s;
}
#txt>b:nth-child(3){
   animation-delay:.5s;
}
#txt>b:nth-child(4){
   animation-delay:.75s;
}
#txt>b:nth-child(5){
   animation-delay:1s;
}
#txt>b:nth-child(6){
   animation-delay:1.25s;
}
#txt>b:nth-child(7){
   animation-delay:1.5s;
}
#txt>b:nth-child(8){
   animation-delay:1.75s;
}
#txt>b:nth-child(9){
   animation-delay:2s;
}
#txt>b:nth-child(10){
   animation-delay:2.25s;
}
#txt>b:nth-child(11){
   animation-delay:2.50s;
}
#txt>b:nth-child(12){
   animation-delay:2.75s;
}
@keyframes getUp{
   10%,50%{
      transform:rotateX(0);
   }
   0%,60%,100%{
      transform:rotateX(-85deg);
   }
}
  </style>
    <!-- style="background-image: url('asset/img/bg_msa.jpg');  background-size: cover;
    background-position: center; background-repeat: no-repeat; " -->
     <!-- style="background: #fffbf2;" -->

     <!-- SAMPLE FOR AUTOMATIC CLICK -->
     <!-- <div class="conatiner">
        <button type="button" class="btn btn-primary" id="checkM" data-bs-toggle="modal" data-bs-target="#exampleModal">ss</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>
     </div>

     <script>
        $(document).ready(function() {
                function checkTime() {
                    // Create a Date object with the current time in Manila time zone
                    var now = new Date().toLocaleString("en-US", {timeZone: "Asia/Manila"});
                    now = new Date(now);
                    
                    var hours = now.getHours();
                    var minutes = now.getMinutes();
                     
     
                    // Check if it's 5pm in Manila
                    if (hours === 11 && minutes === 40) {
                        // Trigger the button click
                        $('#checkM').click();
                        alert('check time');
                    }
                }

                // Check the time every minute
                setInterval(checkTime, 60000);
            });

     </script> -->
    <div class="container-fluid min-vh-100 mt-0 position-relative"  style="background:#f4f1ec;">
 
        <div class="row " style="min-width:100%;">
            <div class="txt" id="txt">
                    <b>A</b><b>N</b><b>N</b><b>O</b><b>U</b><b>N</b><b>C</b><b>E</b><b>M</b><b>E</b><b>N</b><b>T</b>
            </div>
            <div class="scroller" data-speed="slow" data-direction="right">
                <ul class="tag-list scroller__inner p-0 d-flex gap-2 py-2 flex-wrap ">

                    <li class="scroll-li">

                        <div class="col-12 lh-base">
                            <div class="quote">
                                <a class="first"> It's not about ideas</a>
                                <a class="slidein"> It's about making ideas happen</a>
                                <a class="slidein two"> ~Scott Belsky</a>
                            </div>
                        </div>

                    </li>
                    <li class="scroll-li">

                        <div class="col-12 lh-base archivo-black-regular fs-1">
                            <div class="box">
                                <button class="welcome">WELCOME TO HEROGRAM <?= $employee_name ?>!</button>
                                <div class="space">
                                    <span style="--i: 31" class="star"></span>
                                    <span style="--i: 12" class="star"></span>
                                    <span style="--i: 57" class="star"></span>
                                    <span style="--i: 93" class="star"></span>
                                    <span style="--i: 23" class="star"></span>
                                    <span style="--i: 70" class="star"></span>
                                    <span style="--i: 6" class="star"></span>
                                </div>
                            </div>

                        </div>


                    </li>
                 

                </ul>
            </div>

        </div>
        <div class="container p-0 overflow-hidden">
            <div class="row">
                <div class="box-item1 mb-4">
                    <div class="flip-box">
                        <!--  style="background-image: url('asset/img/a.jpg'); border-image: fill 0 linear-gradient(#0001, #000);" -->
                        <div class="flip-box-front p-2 text-center bg-dark">
                            <p class="h3 flip-box-header text-white  border-bottom p-4">Attendance</p>
                            <div class="inner text-white">
                                <button class="shadow__btn" id="switch">
                                    Start time
                                </button>

                            </div>
                        </div>
                        <!-- style="background-image: url('asset/img/marcus.jpg'); " -->
                        <div class="flip-box-back text-center" >
                            <div class="inner text-white">

                                <div class="row">
                                    <div class="col-12 mb-4 ">
                                        <p class="h3 flip-box-header">Attendance</p>
                                        <div class="timer-container border-top p-2">

                                            <button id="endAttendance" class="btn btn-danger">End time</button>
                                        </div>
                                        <input type="hidden" name="" id="hidden_employee_attendance_id_attendance">
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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-item mb-4">
                    <div class="flip-box2">

                    <!-- style="background-image: url('asset/img/a.jpg'); border-image: fill 0 linear-gradient(#0001, #000);" -->
                        <div class="flip-box-front text-center p-2 rounded bg-dark" >
                            <p class="h3 flip-box-header text-white  border-bottom p-4">Activity </p>
                            <div class="inner text-white p-4">

                                <div class="input-group mb-2">
                                    <select class="form-select" aria-label=" select example" id="activity_type">
                                        <?php
                                        $get_act = $activity_model->getAllActivity();

                                        for ($i = 0; $i < count($get_act); $i++) :
                                            if ($get_act[$i]['activity_id'] === 1) {
                                                continue;
                                            }
                                        ?>

                                            <option value="<?= $get_act[$i]['activity_id'] ?>">
                                                <?= $get_act[$i]['activity_type'] ?>
                                            </option>
                                        <?php
                                        endfor;
                                        ?>
                                    </select>
                                    <button type="button" id="switch2" class="btn btn-primary">Start time</button>
                                </div>

                                <label for="activity_description" class="form-label">Description</label>

                                <textarea class="form-control" aria-label="With textarea" id="activity_description"></textarea>


                            </div>
                        </div>
                        <!-- style="background-image: url('asset/img/marcus.jpg'); object-fit: fill;" -->
                        <div class="flip-box-back text-center " >
                            <div class="inner text-white">

                                <div class="row">
                                    <div class="col-md-12  mb-4 ">
                                        <p class="h3 flip-box-header">Activity</p>
                                        <div class="timer-container border-top p-2">

                                            <button id="back2" class="btn btn-danger">End time</button>
                                            <input type="hidden" name="" id="hidden_activity_type">
                                            <input type="hidden" name="" id="hidden_employee_attendance_id">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12  mb-4 d-flex justify-content-center">

                                    <div class="loader">
                                        <span class="ball ball1"></span>
                                        <span class="ball"></span>
                                        <span class="ball"></span>
                                        <span class="ball"></span>
                                        <span class="ball"></span>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- <div class="container-fluid">
            <div class="row">
                <div class="imgLoader"></div>

                <div class="container pg">

                    <h1 class="title  tracking-in-expand text-center" style="color: #f5617b;">
                        <span class="angkor-regular">MSA</span><br><span class="fs-4">Previously My Story Animated</span>
                    </h1>

                    <div class="book">
                        <div class="gap"></div>
                        <div class="pages">
                            <div class="page"></div>
                            <div class="page"></div>
                            <div class="page"></div>
                            <div class="page"></div>
                            <div class="page"></div>
                            <div class="page"></div>
                        </div>
                        <div class="flips">
                            <div class="flip flip1">
                                <div class="flip flip2">
                                    <div class="flip flip3">
                                        <div class="flip flip4">
                                            <div class="flip flip5">
                                                <div class="flip flip6">
                                                    <div class="flip flip7"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div> -->

        <div class="container-fluid start-0 bottom-0 p-0 mt-4 fixed-bottom " style="background:  transparent; width:100%; z-index: 5999;">
            <div class="d-flex ">

                <button type="button" class=" btn btn-warning " id="showHistory" data-bs-toggle="collapse" data-bs-target="#history_table"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

            </div>


            <div class="container-fluid collapse rounded" id="history_table">
                <div class="container-fluid pb-2">
                    <p class="display-4 fs-1 navbar-brand">History</p>
                    <div class="table-responsive" style="max-height: 300px;">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="sticky-top">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">activity type</th>
                                    <th scope="col">start time</th>
                                    <th scope="col">end time</th>
                                    <th scope="col">total_time</th>
                                </tr>
                            </thead>
                            <tbody id="table_body_container_dashboard">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- <script type="text/javascript" src="asset/js/main_board.js"></script> -->
<script>
    $(document).ready(function () {
    const scrollers = document.querySelectorAll(".scroller");
    let employeeAttendanceId = localStorage.getItem('employee_attendance_id');
    let endAttendance = localStorage.getItem('endAttendance');
    let ActivityEmployeeAttendanceId = localStorage.getItem('activity_employee_attendance_id');
    let StoreActivityType = localStorage.getItem('activity_hidden_activity_type');
    let back2 = localStorage.getItem('back2');
    // Set values to the corresponding inputs
    $('#hidden_employee_attendance_id_attendance').val(employeeAttendanceId);
    $('#endAttendance').val(endAttendance);
    $("#hidden_activity_type").val(StoreActivityType);
    $('#hidden_employee_attendance_id').val(ActivityEmployeeAttendanceId);
    $('#back2').val(back2);

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

    $("#showHistory").click(function () {

        $('.fa-arrow-up').toggleClass('rotate90');
        getEmployeeData();
    });

    let session_employee_id = $('#session_employee_id').val();
    let session_employee_name = $('#session_employee_name').val();
    let session_department_id = $('#session_department_id').val();
    let session_credential_id = $('#session_credential_id').val();
    // let activity__type;
    let activityy__description;
    let timer;

    let start_time;
    let hidden_employee_attendance_id;

    function startTimer() {

        activity__type = "1";
        activityy__description = "Attendance";
        $.ajax({
            type: 'POST',
            url: 'Controller/AttendanceController.php',
            data: {
                employee_id: session_employee_id,
                employee_name: session_employee_name,
                department_id: session_department_id,
                credential_id: session_credential_id,
                activity_type: activity__type,
                activity_description: activityy__description
            },
            dataType: 'json',
            success: function (result) {

                if (result.status === 'success') {

                    let dateTimeString1 = result.data.start_time;

                    let date1 = new Date(dateTimeString1);
                    let options = {
                        timeZone: 'Asia/Manila'
                    };
                    let asiaManilaTimeString = date1.toLocaleString('en-US', options);
                    // Save values to localStorage
                    localStorage.setItem('employee_attendance_id', result.data.employee_attendance_id);
                    localStorage.setItem('endAttendance', asiaManilaTimeString);    
                    $('#hidden_employee_attendance_id_attendance').val(result.data.employee_attendance_id);
                    $('#endAttendance').val(asiaManilaTimeString);
                    getEmployeeData();
                } else {
                    alert('Failed to start Attendance');
                }
            },
            error: function (error) {
                console.log(error);
            }
        });


    }

    function startTimerActivity() {
      
        activity__type = $('#activity_type').val();
        activityy__description = $('#activity_description').val();


        $.ajax({
            type: 'POST',
            url: 'Controller/AttendanceController.php',
            data: {
                employee_id: session_employee_id,
                employee_name: session_employee_name,
                department_id: session_department_id,
                credential_id: session_credential_id,
                activity_type: activity__type,
                activity_description: activityy__description

            },
            dataType: 'json',
            success: function (result) {

                if (result.status === 'success') {

                    let dateTimeString1 = result.data.start_time;

                    let date1 = new Date(dateTimeString1);
                    let options = {
                        timeZone: 'Asia/Manila'
                    };


                    let asiaManilaTimeString = date1.toLocaleString('en-US', options);

                    // Save values to localStorage
                    localStorage.setItem('activity_employee_attendance_id', result.data.employee_attendance_id);
                    localStorage.setItem('activity_hidden_activity_type', result.data.activity_type);
                    localStorage.setItem('back2', asiaManilaTimeString);
                    $("#hidden_activity_type").val(result.data.activity_type);
                    $('#hidden_employee_attendance_id').val(result.data.employee_attendance_id);

                    $('#back2').val(asiaManilaTimeString);
                    getEmployeeData();

                } else {
                    alert('Failed to start Attendance');
                }
             

            },
            error: function (error) {
                console.log(error);
            }
        });

    }

    function getSeconds() {
        start_time = $("#endAttendance").val();
        activity__type = "1";
        hidden_employee_attendance_id = $("#hidden_employee_attendance_id_attendance").val();

        $.ajax({
            type: 'POST',
            url: 'Controller/AttendanceController.php',
            data: {
                employee_id: session_employee_id,
                total_seconds: start_time,
                activity_type: activity__type,
                employee_attendance_id: hidden_employee_attendance_id
            },
            dataType: 'json',
            success: function (result) {
                if (result.status === 'success') {
                    // alert('Ended Attendance');
                    getEmployeeData();
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

    function getSecondsAct() {
        start_time = $("#back2").val();
        activity__type = $("#hidden_activity_type").val();
        hidden_employee_attendance_id = $("#hidden_employee_attendance_id").val();

        console.log({
            start_time,
activity__type,
hidden_employee_attendance_id
        });
        $.ajax({
            type: 'POST',
            url: 'Controller/AttendanceController.php',
            data: {
                employee_id: session_employee_id,
                total_seconds: start_time,
                activity_type: activity__type,
                employee_attendance_id: hidden_employee_attendance_id
            },
            dataType: 'json',
            success: function (result) {
                if (result.status === 'success') {
                    $('#activity_description').val('');
                    getEmployeeData();
                } else {
                    alert('Failed to end Attendance');
                }

              
            },
            error: function (error) {
                console.log(error);
            }
        });
        // secondsAct = 0;
        // clearInterval(timer);

    }

 
    let isActionRunning = false;

    if (localStorage.getItem('isCardFlipped') === 'true') {

        $('.flip-box').addClass('hover');
        $('.box-item').addClass('active');
        $('.box-item1').addClass('active');

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


        getSecondsAct();
    
    });


    $(window).on('beforeunload', function () {
        if (isActionRunning) {
            return 'You have an action currently running on this page. Are you sure you want to leave?';
        }
    });

    getEmployeeData();

    function getEmployeeData() {
        $.ajax({
            type: 'GET',
            url: 'Controller/AttendanceController.php',
            data: {
                employee_id: session_employee_id
            },
            success: function (result) {
        

                let container = $('#table_body_container_dashboard');
                container.empty();
             
                let num = 1;
                if(result && result.data && result.data.length > 0){

                    for (let i = 0; i < result.data.length; i++) {
                        let row = $("<tr>");
                        let s = moment(result.data[i].end_time).format('YYYY-MM-DD h:mm:ss A');
                        if (result.data[i].end_time === null) {
                            s = 'ongoing';
                        }
                        var formattedDuration = 'ongoing';
                        let totaltime = moment.duration(result.data[i].total_time, 'seconds');

                        if (result.data[i].total_time !== '' && result.data[i].total_time !== null) {
                            // Get days, hours, minutes, and seconds
                            var days = totaltime.days();
                            var hours = totaltime.hours();
                            var minutes = totaltime.minutes();
                            var seconds = totaltime.seconds();
                            formattedDuration = days + " days, " + hours + " hours, " + minutes + " minutes, " + seconds + " seconds";
                        }



                        let startTime = moment(result.data[i].start_time).format('YYYY-MM-DD h:mm:ss A');
                        // displayData(result);
                        let d0 = $("<td>").text(num);
                        let d1 = $("<td>").addClass("display_name").text(result.data[i].employee_name);
                        let d2 = $("<td>").addClass('display_activity_type').text(result.data[i].activity_type);
                        let d3 = $("<td>").addClass('display_start_time').text(startTime);
                        let d4 = $("<td>").addClass('display_start_end_time').text(s);
                        let d5 = $("<td>").addClass('display_start_end_time').text(formattedDuration);

                        row.append(d0);
                        row.append(d1);
                        row.append(d2);
                        row.append(d3);
                        row.append(d4);
                        row.append(d5);
                        container.append(row);
                        num++;
                    }
                }

            },
            erro: function (error) {
                console.log(error);
            }
        });
    }


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