<?php

require_once('AdminHeader.php');
require_once('../Model/AttendanceModel.php');
if (isset($_SESSION['employee_monitoring_management_view']) && $_SESSION['employee_monitoring_management_view'] == 1) {

    $attendance = new AttendanceModel();
?>
    <style>
        /* th {
        min-width: 10rem;
    } */
    </style>

    <div class="container-fluid">

        <div class="d-flex flex-row p-2 align-items-center">
            <p class="h4 mt-2 me-2 mb-0">Attendance Monitoring</p>

        </div>
        <div class="row ">
            <div class="col-md-6">
                <div class="input-group mb-3">

                    <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fa fa-calendar"></i></span>

                    <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">

                    <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fa fa-calendar"></i></span>

                    <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                </div>
            </div>
        </div>

        <div>
            <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
            <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
        </div>
        <div class="row mt-2">
            <div id="tables ">
                <div class="table-responsive scroll">

                    <table id="table_employee_monitoring" class="table  display nowrap" style="width:100%">
                        <thead>
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
                                <th class="<?= $session_employee_monitoring_management_update ?>">Action</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        var session_employee_monitoring_management_create = "<?php echo $session_employee_monitoring_management_create; ?>";
        var session_employee_monitoring_management_update = "<?php echo $session_employee_monitoring_management_update; ?>";
        var session_employee_monitoring_management_delete = "<?php echo $session_employee_monitoring_management_delete; ?>";

        $(function() {
            $("#start_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
            $("#end_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
        });
    </script>

    <script>
        function fetch(start_date, end_date) {
            // Define the buttons array
            var b = [{
                    "extend": 'copy',
                    "exportOptions": {
                        "columns": ":not(:last-child)"
                    }
                },
                {
                    "extend": 'excel',
                    "exportOptions": {
                        "columns": ":not(:last-child)"
                    }
                },
                {
                    "extend": 'pdf',
                    "orientation": 'landscape',
                    "exportOptions": {
                        "columns": ":not(:last-child)"
                    }
                },
                {
                    "extend": 'print',
                    "orientation": 'landscape',
                    "exportOptions": {
                        "columns": ":not(:last-child)"
                    }
                }
            ];
            var dom_ = 'Bfrtip';
            // Check if the session variable is empty
            if (session_employee_monitoring_management_create.trim() !== '') {
                // If empty, disable or hide the buttons
                b = [];
                dom_ = 'frtip';
            }
            $.ajax({
                url: '../Controller/records.php',
                type: 'POST',
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $("#table_employee_monitoring").DataTable({
                        "data": data,
                        "dom": dom_,
                        "lengthMenu": [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"]
                        ],
                        "buttons": b,
                        "columns": [{
                                "data": 'employee_attendance_id',
                                "render": function(data, type, row, meta) {
                                    return meta.row + 1; // Start numbering from 1
                                }
                            },
                            {
                                "data": 'employee_id',

                            },
                            {
                                "data": 'department_name'
                            },
                            {
                                "data": 'employee_name'
                            },
                            {
                                "data": 'activity_type'
                            },
                            {
                                "data": 'activity_description'
                            },
                            {
                                "data": 'start_time',
                                "render": function(data, type, row, meta) {
                                    return moment(row.start_time).format('YYYY-MM-DD h:mm:ss A');
                                }
                            },
                            {
                                "data": 'end_time',
                                "render": function(data, type, row, meta) {
                                    if (data && moment(data, moment.ISO_8601, true).isValid()) {
                                        return moment(data).format('YYYY-MM-DD h:mm:ss A');
                                    } else {
                                        return 'ongoing';
                                    }
                                }
                            },
                            {
                                "data": "total_time",
                                "render": function(data, type, row, meta) {
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
                            {
                                "data": 'submitted_by'
                            },
                            {
                                "data": 'submitted_on',
                                "render": function(data, type, row, meta) {
                                    return moment(row.submitted_on).format('YYYY-MM-DD h:mm:ss A');
                                }
                            },
                            {
                                "data": 'employee_attendance_id',
                                "orderable": false,
                                "render": function(data, type, row, meta) {
                                    var buttons = '';
                                    // Generate HTML for both buttons
                                    if (session_employee_monitoring_management_update.trim() === '') {
                                        buttons += '<button type="button" class="btn btn-outline-warning prompt me-2 exclude-from-export '+ session_employee_monitoring_management_update +'" data-bs-id="' + data + '">Prompt <i class="fa fa-exclamation-circle" aria-hidden="true"></i></button>' +
                                            '<button type="button" class="btn btn-outline-danger remove exclude-from-export '+ session_employee_monitoring_management_delete +'" data-bs-id="' + data + '"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                                    }

                                    return buttons;
                                }

                            }

                        ],
                        "responsive": true,

                    });
                },

            });
        }
        fetch();
        //     filter
        // reset

        $(document).on('click', '#filter', function(e) {
            e.preventDefault();


            var start_date = $("#start_date").datepicker('getDate');
            var end_date = $("#end_date").datepicker('getDate');

            if (start_date == null || end_date == null) {
                alert("both dates are required");
            } else {
                // Format date values using moment.js
                start_date = moment(start_date).format('YYYY-MM-DD');
                end_date = moment(end_date).format('YYYY-MM-DD');

                $("#table_employee_monitoring").DataTable().destroy();
                fetch(start_date, end_date);
            }


        });

        $("#reset").click(function(e) {
            e.preventDefault();
            $("#start_date").val('');
            $("#end_date").val('');
            $("#table_employee_monitoring").DataTable().destroy();
            fetch();
        });

        $(document).on('click', '.prompt', function() {
            // Retrieve the employee ID from the data-bs-id attribute
            var employeeId = $(this).data('bs-id');
            alert('Employee has been prompt');
            $.ajax({
                type: 'POST',
                url: '../Controller/AlertController.php',
                data: {
                    notify_employee: employeeId
                },
                dataType: 'json',
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $(document).on('click', '.remove', function() {
            var id = $(this).data('bs-id');

            // console.log("Employee ID: " + id);
            $.ajax({
                type: 'POST',
                url: '../Controller/AttendanceController.php',
                data: {
                    remove_attendance: id
                },
                dataType: 'json',
                success: function(res) {
                    if (res != false) {
                        $("#table_employee_monitoring").DataTable().destroy();
                        fetch();
                    } else {
                        alert("Ongoing activity cannot be remove");
                    }
                    console.log(res);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
<?php
    require_once('AdminFooter.php');
}
?>