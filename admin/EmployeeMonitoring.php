<?php
require_once('AdminHeader.php');
require_once('../Model/AttendanceModel.php');

$attendance = new AttendanceModel();
?>
<style>
    th {
        min-width: 10rem;
    }
</style>

<div class="table-responsive scroll">
   
    <div class="d-flex flex-row p-2 align-items-center">
        <p class="h4 mt-2 me-2 mb-0">Attendance Monitoring</p>

        <button class="btn btn-primary" type="button" id="create_excel">Export</button>
    </div>
<div id="tables">

    <table id="table_employee_monitoring" class="table table-sm table-md table-lg ">
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
                
            </tr>
        </thead>
       
    </table>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#table_employee_monitoring").DataTable({
            "bProcessing": true,
            "serverSide": true,
            "select": true,
            "ajax":{
                type: "POST",
                url: "../Controller/response.php",
                error: function(){
                    console.log("error");
                },
            },
            "dom": 'lBfrtip',
            buttons:[
                'copy', 'excel', 'pdf', 'csv'
            ]
        });

        $("#create_excel").click(function(e){
            window.open('data:application/vnd.ms-excel,' +  encodeURIComponent($('#tables').html()));
            e.preventDefault();

         });
    });
</script>
<?php
require_once('AdminFooter.php');
?>