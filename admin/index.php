<?php

require_once ('AdminHeader.php');

?>
<style>
    .card-header {
        background-color: #f0e0ff;
    }
</style>
<div class="container-fluid min-vh-100">
    <div class="row mb-2">
        <div class="col-lg-4 mb-4" style="max-height:500px;">
            <div class="card shadow " >
                <div class="card-header  py-3 text-center ">
                    <h5 class="card-header ">TOTAL EMPLOYEE</h5>
                    <span>
                        <?php echo date('F j, Y'); ?>
                    </span>
                    <div class="card-body">
                        <p class="card-title " id="totalEmp">1</p>
                        <div class="more-info <?= $empManageState ?>">
                            <a href="Employee.php" id="#">More Info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4" style="max-height:500px;">
            <div class="card shadow" >
                <div class="card-header  py-3 text-center ">
                    <h5 class="card-header ">TOTAL ADMIN</h5>
                    <span>
                        <?php echo date('F j, Y'); ?>
                    </span>
                    <div class="card-body">
                        <p class="card-title " id="totalAdmin">1</p>
                        <div class="more-info <?= $adminState ?>">
                            <a href="AdminAccount.php" id="#">More Info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4 " style="min-height:70%;">
            <div class="card shadow" >
                <div class="card-header  py-3 text-center ">
                    <h5 class="card-header ">ACTIVE EMPLOYEES</h5>
                    <span>
                        <?php echo date('F j, Y'); ?>
                    </span>
                    <div class="card-body">
                        <p class="card-title " id="totalLogon"></p>
                        <div class="more-info <?= $empManageState ?>">
                            <a href="Employee.php" id="#">More Info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <caption>Today's Attendance</caption>
        <div class="col-md-12" >
            <table class="table " id="table_employee_monitoring" style="max-height: 400px;">
                <thead class="sticky-top">
                    <tr>
                        <th>No.</th>
                        <th>Employee id</th>
                        <th>Department</th>
                        <th>Employee</th>
                        <th>Activity</th>
                        <th>Description</th>
                        <th>Start time</th>
                        <th>End time</th>
                        <th>Total time</th>
                        <th>Submitted by</th>
                        <th>Submitted on</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
                <tfoot class="sticky-bottom">
                    <tr>
                        <td class="text-center <?= $empManageState ?>" colspan="12">
                            <a href="EmployeeMonitoring.php">View more details</a>
                        </td>
                    </tr>

                </tfoot>
            </table>
        </div>
        <div class="col-md-5">

        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        getCurrentAttendance();
        totalEmployee();
    });


    function getCurrentAttendance(){
        $.ajax({
            type: 'POST',
            url: '../Controller/DashboardController.php',
            dataType: 'json',
            data:{
                get_data: 'get_data'
            },
            success: function(data){
             
                $("#table_employee_monitoring").DataTable({
                    "data": data,
                    "dom": 'rtip',
                    "columns": [
                        {
                            "data": 'employee_attendance_id',
                            "render": function (data, type, row, meta) {
                                return meta.row + 1; // Start numbering from 1
                            }
                        },
                        {
                            "data": 'employee_id',

                        },
                        { "data": 'department_name' },
                        { "data": 'employee_name' },
                        { "data": 'activity_type' },
                        { "data": 'activity_description' },
                        {
                            "data": 'start_time',
                            "render": function (data, type, row, meta) {
                                return moment(row.start_time).format('YYYY-MM-DD h:mm:ss A');
                            }
                        },
                        {
                            "data": 'end_time',
                            "render": function (data, type, row, meta) {
                                if (data && moment(data, moment.ISO_8601, true).isValid()) {
                                    return moment(data).format('YYYY-MM-DD h:mm:ss A');
                                } else {
                                    return 'ongoing';
                                }
                            }
                        },
                        {
                            "data": "total_time",
                            "render": function (data, type, row, meta) {
                                // Convert total_time to days, hours, minutes, and seconds
                                var days = Math.floor(data / (24 * 3600));
                                var hours = Math.floor((data % (24 * 3600)) / 3600);
                                var minutes = Math.floor((data % 3600) / 60);
                                var seconds = Math.floor(data % 60);

                                // Construct formatted duration string
                                var formattedDuration = days + " days, " + hours + " hours, " + minutes + " minutes, " + seconds + " seconds";

                                return formattedDuration;
                            }
                        },
                        { "data": 'submitted_by' },
                        {
                            "data": 'submitted_on',
                            "render": function (data, type, row, meta) {
                                return moment(row.submitted_on).format('YYYY-MM-DD h:mm:ss A');
                            }
                        }

                    ],
                    "responsive": true,

                });
            }
        });
    }

    function totalEmployee(){
        $.ajax({
            type: 'POST',
            url: '../Controller/DashboardController.php',
            dataType: 'json',
            data: {
                total_emp: 'total_emp'
            },
            success: function(data){
                $('#totalEmp').text(data.data.tl);
                $('#totalAdmin').text(data.data.ta);
                $('#totalLogon').text(data.data.lg + " Online");
                // console.log(data.data.tl);
            },
            error: function (er){
                console.log(er);
            }
        });
    }
</script>
<?php
require_once ('AdminFooter.php');
?>