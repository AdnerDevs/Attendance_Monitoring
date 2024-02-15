<?php
    require_once ('header.php');
    require_once ('Model/ActivityModel.php');

    $activity = new ActivityModel();
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
                            $acty = $activity->getAllActivity();
                            foreach ($acty as $act):
                        ?>
                        <tr>
                            <td><?= $act['activity_id']?></td>
                            <td><?= $act['activity_type']?></td>
                            <td><?= $act['activity_created_time']?></td>
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