<div class="container">
    <div class="row">
        <div class="box-item1 col-md-6 mb-4" >
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
                            <div class="co-12 mb-4 ">
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

                        <label for="basic-url" class="form-label">Description</label>

                        <textarea class="form-control" aria-label="With textarea" id="activity_description"></textarea>


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

<div class="container-fluid start-0 bottom-0 p-0 mt-4 fixed-bottom "
    style="background:  transparent; width:100%; z-index: 5;">
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
                        </tr>
                    </thead>
                    <tbody id="table_body_container_dashboard">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>