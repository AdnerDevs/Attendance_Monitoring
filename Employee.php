<?php

    require_once ('header.php');
    require_once ('Model/EmployeeModel.php');

    $users = new EmployeeModel();
    $employee = $users->getAllEmployees();
?>

            <div class="table-responsive">
                <div class="d-flex flex-row p-2 align-items-center">
                    <p class="h4 mb-0 me-2">Employees</p>
                </div>
                    
         
                
                <table class="table">
                    <caption>
                        Description of the table.
                    </caption>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Employee id</th>
                            <th>Name</th>    
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $number=1;
                            foreach ($employee as $employees):
                                $status = "Offline";
                             
                                if( $employees['status'] == 1){
                                    $status = 'Online';
                                }
                        ?>
                        <tr>
                            <td><?= $number ?></td>
                            <td><?=$employees['employee_id']?></td>
                            <td><?=$employees['employee_name']?></td>
                            <td><?= $status ?></td>
                            <td>
                                <button type="button" class="btn btn-primary me-2 EditActivityBtn" id="" data-bs-type="" data-bs-id="" data-bs-toggle="modal" data-bs-target="#EditActivityModal">Edit</button>
                                <button type="button" class="btn btn-danger me-2 DeleteActivityBtn" data-bs-id="">delete</button>
                                <button type="button" class="btn btn-secondary"   data-bs-id=""></button>
                                
                            </td>
                        </tr>
                        <?php
                            $number++;
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

</script>
<?php
    require_once ('footer.php');
?>