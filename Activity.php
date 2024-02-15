<?php
    require_once ('header.php');
?>

            <div class="table-responsive">
                <p class="h4 mb-4 mt-2">Activity</p>
                <table class="table">
                    <caption>
                        Description of the table.
                    </caption>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Activity Type</th>
                            <th>Date created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            for ($i = 0; $i <  5; $i++):
                        ?>
                        <tr>
                            <td>1</td>
                            <td>Attendance</td>
                            <td>11/11/11</td>
                            <td>
                                <button class="btn btn-primary me-2">btn1</button>
                                <button class="btn btn-secondary">btn2</button>
                            </td>
                        </tr>

                        <?php
                            endfor;
                        ?>
                    </tbody>
                </table>
            </div>


<?php
    require_once ('footer.php');
?>