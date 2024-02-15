<?php
    require_once ('header.php');
    require_once ('Model/AttendanceModel.php');

    $attendance = new AttendanceModel();
?>

            <div class="table-responsive">
                <p class="h4 mb-4 mt-2">Attendance Monitoring</p>
                <table class="table">
                    <caption>
                        Description of the table.
                    </caption>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>employee</th>
                            <th>activity</th>
                            <th>description</th>
                            <th>start time</th>
                            <th>end time</th>
                            <th>total time</th>
                            <th>Submitted by</th>
                            <th>Submitted in</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $att = $attendance->getAllAttendanceData();
                            foreach ($att as $attendanceData):
                        ?>
                        <tr>
                            <td><?= $attendanceData['employee_attendance_id']?></td>
                            <td><?= $attendanceData['employee_name']?></td>
                            <td><?= $attendanceData['activity_type']?></td>
                            <td><?= $attendanceData['activity_description']?></td>
                            <td><?= $attendanceData['start_time']?></td>
                            <td><?= $attendanceData['end_time']?></td>
                            <td><?= $attendanceData['total_time']?></td>
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
    require_once ('footer.php');
?>