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

    <table id="myTable" class="table table-sm table-md table-lg align-middle">
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
                <th>Submitted in</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $att = $attendance->getAllAttendanceData();
            $number = 1;
            foreach ($att as $attendanceData):
                $aStartTime = new DateTime($attendanceData['start_time']);
                $aEndTime = new DateTime($attendanceData['end_time']);
                $formattedTimeStart = $aStartTime->format('Y-m-d h:i:s A');
                $formattedTimeEnd = $aEndTime->format('Y-m-d h:i:s A');

                $interval = $aEndTime->diff($aStartTime);
                // Format the total time
                $totalTime = $interval->format('%d day %h hrs %i mns %s secs');
                $day = $attendanceData['day'];
                $hour = $attendanceData['hour'];
                $minute = $attendanceData['minute'];
                $seconds = $attendanceData['second'];
                $formattedTime = sprintf("%d day(s), %d hrs, %d mins, %d secs", $day, $hour, $minute, $seconds);
                ?>
                <tr>
                    <td>
                        <?= $number ?>
                    </td>
                    <td>
                        <?= $attendanceData['employee_id'] ?>
                    </td>
                    <td>
                        <?= $attendanceData['department_name'] ?>
                    </td>
                    <td>
                        <?= $attendanceData['employee_name'] ?>
                    </td>
                    <td>
                        <?= $attendanceData['activity_type'] ?>
                    </td>
                    <td>
                        <?= $attendanceData['activity_description'] ?>
                    </td>
                    <td>
                        <?= $formattedTimeStart ?>
                    </td>
                    <td>
                        <?= $formattedTimeEnd ?>
                    </td>
                    <td>
                        <?= $formattedTime ?>
                    </td>
                    <td>
                        <?= $attendanceData['submitted_by'] ?>
                    </td>
                    <td>
                        <?= $formattedTimeEnd ?>
                    </td>
                    <td>
                        <button class="btn btn-primary me-2">btn1</button>
                        <button class="btn btn-secondary">btn2</button>
                    </td>
                </tr>

                <?php
                $number++;
            endforeach;
            ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        $("#create_excel").click(function(){
            var excel_data = $("#myTable").html();
            // var page = "../Controller/excel.php?data=" + excel_data;
            // window.location.href = "../Controller/excel.php?data=" + excel_data;
      
            $.ajax({
                url: "../Controller/excel.php",
                type: "POST",
                data: { data: excel_data },
                success: function(response) {
                    // Handle the response from excel.php
                    console.log(response);
                    // If you want to trigger a download, you can redirect the browser
                    window.location.href = response;
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<?php
require_once('AdminFooter.php');
?>