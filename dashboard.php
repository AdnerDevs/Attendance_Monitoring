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

    <link rel="stylesheet" href="asset/css/infiniteLoop.css">
    <link rel="stylesheet" href="asset/css/dashboard.css">
    <link rel="stylesheet" href="asset/css/btnStartAnimation.css">
    <link rel="stylesheet" href="asset/css/ballAnimation.css">
    <link rel="stylesheet" href="asset/css/sliding.css">
    <link rel="stylesheet" href="./asset/css/quo.css">
    <link rel="stylesheet" href="./asset/css/FontStyleDashboard.css">
    <link rel="stylesheet" href="./asset/css/AnnouncementText.css">
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
     
    <div class="container-fluid min-vh-100 mt-0 position-relative"  style="background:#f4f1ec;">
        <div class="row " style="min-width:100%;">
            <!-- <p id="anim_announcement" class="h4 text-center fs-1 tracking-in-expand p-2 animate__animated animate__zoomInUp" style="color: #e4dfff; font-family: cursive; background: transparent !important;"> Announcement <i class="fa fa-bullhorn" aria-hidden="true"></i></p> -->
            <div class="txt" id="txt">
                    <b>A</b><b>N</b><b>N</b><b>O</b><b>U</b><b>N</b><b>C</b><b>E</b><b>M</b><b>E</b><b>N</b><b>T</b>
            </div>
            <div class="scroller" data-speed="slow" data-direction="right">
                <ul class="tag-list scroller__inner p-0 d-flex gap-2 py-2 flex-wrap ">

                    <li class="scroll-li">

                        <div class="col-12 lh-base">
                            <div class="quote">
                                <a class="first">Everyone Has the right to</a>
                                <a class="slidein"> Freedom of thought, conscience</a>
                                <a class="slidein two"> and religion. </a>
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
                    <?php
                    $announcement = $announcement_model->getAllAnnouncement();

                    for ($i = 0; $i < count($announcement); $i++) :
                        $announce = $announcement[$i];
                        $announce['announcement_text'] = htmlspecialchars_decode($announce['announcement_text']);
                    ?>
                        <li class="scroll-li">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row text-center">
                                        <?php if (!empty($announce['announcement_image'])) : ?>
                                            <div class="col-12 text-center">
                                                <img src="asset/upload/<?= $announce['announcement_image'] ?>" alt="" height="100">
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-12 lh-base p-2">
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

    <script type="text/javascript" src="asset/js/main_board.js"></script>

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