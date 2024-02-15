<?php
    require_once ('header.php');
    require_once ('Model/ActivityModel.php');

    $activity = new ActivityModel();
?>

            <div class="table-responsive">
                <div class="d-flex flex-row p-2 align-items-center">
                    <p class="h4 mb-0 me-2">Activity</p>

                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#ActivityModal">Add</button>
                </div>
                    
         
                
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
                                <button class="btn btn-primary me-2">Edit</button>
                                <button class="btn btn-danger me-2">delete</button>
                                <button class="btn btn-secondary">archive</button>
                            </td>
                        </tr>

                        <?php
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


<script>

    $(document).ready(function(){

        let activityType; 

        $("#saveActivity").click(function(){

            activityType = $("#ActivityTypeInput").val();

            addActivity(activityType);
        });

    });

    function addActivity(activityType){
        $.ajax({
            type: 'POST',
            url: 'Controller/ActivityController.php',
            data: {
                act_type:activityType,
            },
            success: function(response){
                if(response === 'success'){
                    alert("Inserted Successfully");
                    location.reload();
                }else{
                    alert("Failed to insert")
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }
</script>
<?php
    require_once ('footer.php');
?>