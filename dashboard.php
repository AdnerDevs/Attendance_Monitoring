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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Butterfly+Kids&family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&family=Butterfly+Kids&family=Pacifico&display=swap');

        .pacifico-regular {
            font-family: "Pacifico", cursive;
            font-weight: 400;
            font-style: normal;

        }

        .archivo-black-regular {
            font-family: "Archivo Black", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .archivo-black-regular:hover {
            font-size: 20px;
        }

        .box {
            --clr-shadow__border: #d9a1ff;
            --clr-text: #F6F4EB;
            --clr-space: #120e1e;
            --clr-space-gr: #271950;
            --clr-star: #E9F8F9;
            --size: 3rem;
            position: relative;
            outline: 1px solid var(--clr-shadow__border);
        }

        .welcome {
            font-weight: 600;
            font-size: 1.5rem;
            letter-spacing: 0.2rem;
            background: transparent;
            padding: calc(var(--size) / 3) var(--size);
            border: none;
            cursor: pointer;
            color: var(--clr-text);
            text-shadow: 2px 0px var(--clr-shadow__border), 0px 2px var(--clr-shadow__border),
                -2px 0px var(--clr-shadow__border), 0px -2px var(--clr-shadow__border);
        }

        .space {
            width: 100%;
            height: 100%;
            bottom: 0%;
            gap: 1.5rem;
            transition: 0.5s ease-in-out;
            z-index: -1;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            display: flex;
            background: linear-gradient(160deg, var(--clr-space), var(--clr-space-gr));
        }

        .box:hover .space {
            opacity: 1;
        }

        .star {
            height: 4rem;
            width: 0.3rem;
            transition: 0.5s;
            border-radius: 50px;
            clip-path: polygon(50% 0%, 100% 100%, 0% 100%);
            position: relative;
            background-color: var(--clr-star);
            animation: space-animation calc(0.1s * var(--i)) linear infinite;
        }

        @keyframes space-animation {
            0% {
                transform: rotate(-30deg) translateY(calc(-52% * var(--i)));
            }

            100% {
                transform: rotate(-30deg) translateY(calc(52% * var(--i)));
            }
        }
    </style>
    <style>
        .quote {
            cursor: pointer;
            position: relative;
            text-align: center;
            display: block;
            width: 400px;
            border: none;
            font-size: 12px;
            height: 7rem;
            text-decoration: none;
            font-weight: 600;
            overflow: hidden;
            box-shadow: 0 10px 50px #111b29;
            border-radius: 10px;
            padding: 10px 20px;
        }

        .quote .ten {
            line-height: 52px;
        }

        .quote:hover .slidein {
            left: 0%;
        }

        .quote:hover .two {
            left: 0%;
            transition-delay: 1.5s;
        }

        .quote .slidein {
            background: #3398ff;
            left: -100%;
            z-index: 2;
        }

        .quote a {
            text-transform: uppercase;
            transition: left 300ms;
            display: flex;
            align-items: center;
            justify-content: center;
            letter-spacing: 1px;
            background-image: url('asset/img/pogi.jpg');
            position: absolute;
            font-weight: bold;
            font-size: 1.5rem;
            letter-spacing: 0.2rem;
            text-decoration: none;
            z-index: 1;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: #fff;
            background-position: center;

        }

        .slidein:nth-child(even) {
            background-image: url('asset/img/pogi2.jpg') !important;
            background-position: center;

        }

        .slidein:nth-child(odd) {
            background-image: url('asset/img/pogi3.jpg') !important;
            /* background-repeat: no-repeat;
            background-attachment: fixed; */
            background-position: center;
        }
    </style>
    <div class="container-fluid min-vh-100 mt-0 position-relative" style="background-image: url('asset/img/bg_msa.jpg');  background-size: cover;
    background-position: center; background-repeat: no-repeat; ">
        <div class="row sticky-md-top" style="min-width:100%;">
            <p class="h4 text-center fs-1 tracking-in-expand text-white p-2 shadow "><i class="fa fa-bullhorn" aria-hidden="true" style="transform: rotateY(180deg);"></i> Announcement <i class="fa fa-bullhorn" aria-hidden="true"></i></p>
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
                        <div class="flip-box-front p-2 text-center" style="background-image: url('asset/img/a.jpg'); border-image: fill 0 linear-gradient(#0001, #000);">
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

                        <div class="flip-box-front text-center p-2" style="background-image: url('asset/img/a.jpg'); border-image: fill 0 linear-gradient(#0001, #000);">
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
                        <div class="flip-box-back text-center" style="background-image: url('asset/img/marcus.jpg'); object-fit: fill;">
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

                <!-- <a href="https://twitter.com/amit_sheen" class="twitterLink" target="_top">
                    <img src="https://assets.codepen.io/1948355/twitterLogo2.png" />
                </a> -->
            </div>
        </div>

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