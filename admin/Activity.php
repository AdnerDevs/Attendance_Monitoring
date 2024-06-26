<?php

require_once('AdminHeader.php');
require_once('../Model/ActivityModel.php');

$activity = new ActivityModel();
?>

<div class="table-responsive">
    <div class="d-flex flex-row p-2 align-items-center">
        <p class="h4 mb-0 me-2">Activity</p>

        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#ActivityModal">Add</button>
    </div>



    <table class="table align-middle" id="myTable">
        <thead>
            <tr>
                <th>id</th>
                <th>Activity Type</th>
                <th>Date created</th>
                <th>Date edited</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $acty = $activity->getAllActivity();
            $number = 1;
            $firstRow = true;
            foreach ($acty as $act) :

                $status = "Active";
                $class = "text-success";
                $btn = "ArchiveActivityBtn";
                $btnType = "btn-secondary";

                $activityEditedTime = new DateTime($act['activity_edited_time']);
                $activity_created_time = new DateTime($act['activity_created_time']);
                $formattedTime = $activityEditedTime->format('Y-m-d h:i:s A');
                $formattedTimeCreated = $activity_created_time->format('Y-m-d h:i:s A');

                $btnState = '<i class="fa fa-eye" aria-hidden="true"></i>';


                if ($act['isArchive'] == 1) {
                    $status = "Archived";
                    $class = "text-danger";
                    $btn = "UnarchiveActivityBtn";
                    $btnType = "btn-warning";
                   
                    $btnState = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
                }
            ?>
                <tr>
                    <td><?= $number ?></td>
                    <td><?= $act['activity_type'] ?></td>
                    <td><?= $formattedTimeCreated ?></td>
                    <td><?= $formattedTime ?></td>
                    <td class="<?= $class ?>"><?= $status ?></td>
                    <td>
                        <button type="button" class="btn btn-primary me-2 EditActivityBtn" id="" data-bs-type="<?= $act['activity_type'] ?>" data-bs-id="<?= $act['activity_id'] ?>" data-bs-toggle="modal" data-bs-target="#EditActivityModal" <?= $firstRow ? 'disabled' : '' ?>><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-danger me-2 DeleteActivityBtn" data-bs-id="<?= $act['activity_id'] ?>" <?= $firstRow ? 'disabled' : '' ?>><i class="fa fa-trash" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-success <?= $btnType ?> <?= $btn ?>" data-bs-id="<?= $act['activity_id'] ?>" <?= $firstRow ? 'disabled' : '' ?>><?= $btnState ?></button>

                    </td>
                </tr>

            <?php
                $number++;
                $firstRow = false;
            endforeach;

            ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="ActivityModal" tabindex="-1" aria-labelledby="ActivityModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ActivityTitle">Add Activity Type</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Activity Type</label>
                    <input type="text" class="form-control" id="ActivityTypeInput" placeholder="Activity type">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveActivity" data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="EditActivityModal" tabindex="-1" aria-labelledby="EditActivityModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditActivityModal">Edit Activity Type</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label editActvity"></label>
                    <input type="text" class="form-control" id="EditActivityTypeInput" placeholder="Activity type">
                    <input type="hidden" id="EditActivityID">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editActivity" data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        let activityType;
        let activityID;

        $("#saveActivity").click(function() {

            activityType = $("#ActivityTypeInput").val();

            addActivity(activityType);
        });


        $(".EditActivityBtn").click(function() {
            activityType = $(this).data('bs-type');
            activityID = $(this).data('bs-id');

            $("#EditActivityModal").find("#EditActivityTypeInput").val(activityType);
            $("#EditActivityModal").find("#EditActivityID").val(activityID);

        });

        $("#editActivity").click(function() {
            activityType = $("#EditActivityTypeInput").val();
            activityID = $("#EditActivityID").val();
            editActivity(activityType, activityID);

        });

        $(".DeleteActivityBtn").click(function() {
            activityID = $(this).data('bs-id');
            deleteActivity(activityID);
        });

        $(".ArchiveActivityBtn").click(function() {
            activityID = $(this).data('bs-id');
            archiveActivity(activityID);
        });

        $(".UnarchiveActivityBtn").click(function() {
            activityID = $(this).data('bs-id');
            unarchiveActivity(activityID);
        });

    });

    function addActivity(activityType) {
        $.ajax({
            type: 'POST',
            url: '../Controller/ActivityController.php',
            data: {
                act_type: activityType,
            },
            success: function(response) {
                if (response === 'success') {
                    alert("Inserted Successfully");
                    location.reload();
                } else {
                    alert("Failed to insert")
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function editActivity(activityType, activityID) {
        $.ajax({
            type: 'POST',
            url: '../Controller/ActivityController.php',
            data: {
                edit_act_type: activityType,
                edit_act_id: activityID,
            },
            success: function(response) {
                if (response === 'success') {
                    alert("Edited Successfully");
                    location.reload();
                } else {
                    alert("Failed to insert")
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function deleteActivity(activityID) {
        $.ajax({
            type: 'POST',
            url: '../Controller/ActivityController.php',
            data: {
                delete_act_id: activityID,
            },
            success: function(response) {
                if (response === 'success') {
                    alert("Deleted Successfully");
                    location.reload();
                } else {
                    alert("Failed to insert")
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function archiveActivity(activityID) {
        $.ajax({
            type: 'POST',
            url: '../Controller/ActivityController.php',
            data: {
                archive_act_id: activityID,
            },
            success: function(response) {
                if (response === 'success') {
                    alert("Actvity has been archived");
                    location.reload();
                } else {
                    alert("Failed to insert")
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function unarchiveActivity(activityID) {
        $.ajax({
            type: 'POST',
            url: '../Controller/ActivityController.php',
            data: {
                unarchive_act_id: activityID,
            },
            success: function(response) {
                if (response === 'success') {
                    alert("Actvity has been unarchived");
                    location.reload();
                } else {
                    alert("Failed to insert")
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>
<?php
require_once('AdminFooter.php');
?>