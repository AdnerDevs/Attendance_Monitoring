<?php
    require_once ('AdminHeader.php');
    require_once ('../Model/AttendanceModel.php');

    $attendance = new AttendanceModel();
?>
<style>
th{
    min-width: 10rem;
}
</style>

            <div class="table-responsive">
                <p class="h4 mb-4 mt-2">Attendance Monitoring</p>
                <table class="table table-sm table-md table-lg align-middle" >
                    <caption>
                        Description of the table.
                    </caption>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th style="">Employee id</th>
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
                            foreach ($att as $attendanceData):
                                $aStartTime = new DateTime($attendanceData['start_time']);
                                $aEndTime = new DateTime($attendanceData['end_time']);
                                $formattedTimeStart = $aStartTime->format('Y-m-d h:i:s A');
                                $formattedTimeEnd = $aEndTime->format('Y-m-d h:i:s A');

                                $interval = $aEndTime->diff($aStartTime);
                                // Format the total time
                                $totalTime = $interval->format('%d day %h hrs %i mns %s secs');
                        ?>
                        <tr>
                            <td><?= $attendanceData['employee_attendance_id']?></td>
                            <td><?= $attendanceData['employee_id']?></td>
                            <td><?= $attendanceData['employee_name']?></td>
                            <td><?= $attendanceData['activity_type']?></td>
                            <td><?= $attendanceData['activity_description']?></td>
                            <td><?= $formattedTimeStart?></td>
                            <td><?= $formattedTimeEnd?></td>
                            <td><?= $totalTime?></td>
                            <td><?= $attendanceData['submitted_by']?></td>
                            <td><?= $attendanceData['submitted_in']?></td>
                            <td>
                                <button class="btn btn-primary me-2">btn1</button>
                                <button class="btn btn-secondary">btn2</button>
                            </td>
                        </tr>

                        <?php
                           endforeach;
                        ?>
                    </tbody>
                </table>
            </div>


<?php
    require_once ('AdminFooter.php');
?>