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
    <link rel="stylesheet" href="asset/css/animatedText.css">
    <link rel="stylesheet" href="asset/css/btnStartAnimation.css">
    <link rel="stylesheet" href="asset/css/ballAnimation.css">
    <link rel="stylesheet" href="asset/css/sliding.css">
    <div class="container-fluid min-vh-100 mt-0 position-relative" style="background-image: url('asset/img/bg_msa.jpg');  background-size: cover;
    background-position: center; background-repeat: no-repeat; ">
        <div class="row sticky-md-top">
            <p class="h4 text-center fs-1 tracking-in-expand text-white p-2 shadow "><i class="fa fa-bullhorn"
                    aria-hidden="true" style="transform: rotateY(180deg);"></i> Announcement <i class="fa fa-bullhorn"
                    aria-hidden="true"></i></p>
            <div class="scroller" data-speed="slow" data-direction="left">
                <ul class="tag-list scroller__inner p-0 d-flex gap-2 py-2 flex-wrap ">
                    <?php
                    $announcement = $announcement_model->getAllAnnouncement();
                    
                    for ($i = 0; $i < count($announcement); $i++):
                        $announce = $announcement[$i];
                        $announce['announcement_text'] = htmlspecialchars_decode($announce['announcement_text']);
                        ?>
                        <li class="scroll-li" style="max-width: 20%;">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row ">
                                        <div class="col-12 text-center">
                                            <img src="asset/upload/<?= $announce['announcement_image'] ?>" alt="" height="100">
                                        </div>
                                        <div class="col-12 lh-base">
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
                        <div class="flip-box-front p-2 text-center"
                            style="background-image: url('asset/img/a.jpg'); border-image: fill 0 linear-gradient(#0001, #000);">
                            <p class="h3 flip-box-header text-white  border-bottom p-4">Attendance</p>
                            <div class="inner text-white">
                                <button class="shadow__btn" id="switch">
                                    Start time
                                </button>

                            </div>
                        </div>
                        <div class="flip-box-back text-center" style="background-image: url('asset/img/marcus.jpg'); ">
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

                        <div class="flip-box-front text-center p-2"
                            style="background-image: url('asset/img/a.jpg'); border-image: fill 0 linear-gradient(#0001, #000);">
                            <p class="h3 flip-box-header text-white  border-bottom p-4">Activity </p>
                            <div class="inner text-white p-4">

                                <div class="input-group mb-2">
                                    <select class="form-select" aria-label=" select example" id="activity_type">
                                        <?php
                                        $get_act = $activity_model->getAllActivity();

                                        for ($i = 0; $i < count($get_act); $i++):
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

                                <textarea class="form-control" aria-label="With textarea"
                                    id="activity_description"></textarea>


                            </div>
                        </div>
                        <div class="flip-box-back text-center"
                            style="background-image: url('asset/img/marcus.jpg'); object-fit: fill;">
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
        <div class="container-fluid">
            <div class="row">
                <div class="imgLoader"></div>

                <div class="container pg">

                    <h1 class="title  tracking-in-expand text-center" style="color: #f5617b;">
                        <span class="angkor-regular">MSA</span><br><span class="fs-4">Previously My Story Animated</span>
                    </h1>

                    <!-- <div class="credit">
    * Images loaded randomly from Picsum.photos
  </div> -->

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

                <a href="https://twitter.com/amit_sheen" class="twitterLink" target="_top">
                    <img src="https://assets.codepen.io/1948355/twitterLogo2.png" />
                </a>
            </div>
        </div>

        <div class="container-fluid start-0 bottom-0 p-0 mt-4 fixed-bottom "
            style="background:  transparent; width:100%; z-index: 5999;">
            <div class="d-flex ">

                <button type="button" class=" btn btn-warning " id="showHistory" data-bs-toggle="collapse"
                    data-bs-target="#history_table"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

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