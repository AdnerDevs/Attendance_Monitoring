<?php

    require_once ('AdminHeader.php');
    require_once ('../Model/EmployeeModel.php');

    $users = new EmployeeModel();
    $employee = $users->getAllEmployees();
    if(isset($_SESSION['employee_management_view']) && $_SESSION['employee_management_view'] == 1){
?>
<?php
                                    isset($_SESSION['employee_management_create']) && $_SESSION["employee_management_create"] == 1 ? $addState = " ": $addState = "d-none";
                                    isset($_SESSION['employee_management_update']) && $_SESSION["employee_management_update"] == 1 ? $editState = " ": $editState = "d-none";
                                    isset($_SESSION['employee_management_delete']) && $_SESSION["employee_management_delete"] == 1 ? $state = " ": $state = "d-none";
                                  
                                   
                                    $isAllowed = (
                                        isset($_SESSION['employee_management_create']) && $_SESSION['employee_management_create'] == 1 &&
                                        isset($_SESSION['employee_management_update']) && $_SESSION['employee_management_update'] == 1 &&
                                        isset($_SESSION['employee_management_delete']) && $_SESSION['employee_management_delete'] == 1
                                    ) ? $hide_action = ' ' : $hide_action = 'd-none';
                                                                                                     
?>
            <div class="table-responsive">
                <div class="d-flex flex-row p-2 align-items-center">
                    <p class="h4 mb-0 me-2">Employees</p>
                </div>
                    
         
                
                <table class="table" id="myTable" class="">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Employee id</th>
                            <th>Department</th>
                            <th>Name</th>
                            <th>Account Created</th>       
                            <th>Status</th>
                            <th class="<?=$hide_action?>">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $number=1;
                            foreach ($employee as $employees):
                                $status = "Offline";
                                $statusClass = "";
                                if( $employees['status'] == 1){
                                    $status = 'Online';
                                    $statusClass = 'text-primary';
                                }
                        ?>
                        <tr>
                            <td><?= $number ?></td>
                            <td><?=$employees['employee_id'] ?></td>
                            <td><?=$employees['department_name'] ?></td>
                            <td><?=$employees['employee_name']?></td>
                            <td><?=$employees['created_time']?></td>
                            <td class="<?= $statusClass ?>"><?= $status ?></td>
                            <td class="<?=$hide_action?>">
                                <button type="button" class="btn btn-primary me-2 EditActivityBtn <?=$editState?>" id="" data-bs-type="" data-bs-id="" data-bs-toggle="modal" data-bs-target="#EditActivityModal">Edit</button>
                                <button type="button" class="btn btn-danger me-2 DeleteActivityBtn <?=$state?>" data-bs-id="">delete</button>
                                <!-- <button type="button" class="btn btn-secondary"data-bs-id=""></button> -->
                                
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
    require_once ('AdminFooter.php');
  }  
?>