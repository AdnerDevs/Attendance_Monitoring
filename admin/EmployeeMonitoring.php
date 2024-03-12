<?php
require_once('AdminHeader.php');
require_once('../Model/AttendanceModel.php');

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

                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                        class="fa fa-calendar"></i></span>

                <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3">

                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                        class="fa fa-calendar"></i></span>

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
    
                </table>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        // $("#table_employee_monitoring").DataTable({
        //     "bProcessing": true,
        //     "serverSide": true,
        //     "select": true,
        //     "ajax": {
        //         type: "POST",
        //         url: "../Controller/response.php",
        //         error: function () {
        //             console.log("error");
        //         },
        //     },
        //     "dom": 'lBfrtip',
        //     buttons: [
        //         'copy', 'excel', 'csv'
        //     ]
        // });

        $("#create_excel").click(function (e) {
            window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#tables').html()));
            e.preventDefault();

        });

        $(function () {
            $("#start_date").datepicker({"dateFormat" : "yy-mm-dd"});
            $("#end_date").datepicker({"dateFormat" : "yy-mm-dd"});
        });
    });
</script>

<script>
    function fetch(start_date, end_date){
        $.ajax({
            url: '../Controller/records.php',
            type: 'POST',
            data: {
                start_date: start_date,
                end_date: end_date
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var i = "1";
                $("#table_employee_monitoring").DataTable({
                    "data": data,
                    "dom": 'Bfrtip',
                    "buttons": [
                        {
                            extend: 'copy'
                        },
                        {
                            extend: 'excel'
                        },
                        {
                            extend: 'pdf',
                            orientation: 'landscape' // Set orientation to landscape
                        },
                        {
                            extend: 'print',
                            orientation: 'landscape' 
                        }
                    ],
                    "responsive": true,
                    "columns": [
                        { 
                            "data": 'employee_id'
                            // "render": function (data, type, row, meta) {
                            //     return '<a href="' + data + '">Download</a>';
                            // }
                        
                        },
                        { "data": 'department_name' },
                        { "data": 'employee_name' },
                        { "data": 'activity_type' },
                        { "data": 'activity_description' },
                        { 
                            "data": 'start_time',
                            "render": function (data, type, row, meta) {
                                return moment(row.start_time).format('yy-MM-DD h:mm:ss A');
                            }
                        },
                        { 
                            "data": 'end_time',
                            "render": function(data, type, row, meta) {
                                if (data && moment(data, moment.ISO_8601, true).isValid()) {
                                    return moment(data).format('yy-MM-DD h:mm:ss A');
                                } else {
                                    return 'ongoing';
                                }
                            }
                        },
                        { "data": 'total_time' },
                        { "data": 'submitted_by' },
                        { 
                            "data": 'submitted_on',
                            "render": function (data, type, row, meta) {
                                return moment(row.submitted_on).format('yy-MM-DD h:mm:ss A');
                            } 
                        }

                    ],
              
                });
            },

        });
    }
    fetch();
//     filter
// reset
  
  $("#filter").click(function(e){
    e.preventDefault();

  
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();

    if(start_date == "" || end_date == ""){
        alert("both date required");
    }else{
        $("#table_employee_monitoring").DataTable().destroy();
        fetch(start_date, end_date);
    }


  });

$("#reset").click(function(e){
    e.preventDefault();
    $("#start_date").val('');
    $("#end_date").val('');
    $("#table_employee_monitoring").DataTable().destroy();
    fetch();
});
</script>
<?php
require_once('AdminFooter.php');
?>