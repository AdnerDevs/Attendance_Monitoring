<?php

    require_once ('AdminHeader.php');
    require_once ('../Model/DepartmentModel.php');

    $department_model = new DepartmentModel();
?>

            <div class="table-responsive">
                <div class="d-flex flex-row p-2 align-items-center">
                    <p class="h4 mb-0 me-2">Department</p>

                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#DepartmentModal">Add</button>
                </div>
                    
         
                
                <table class="table" id="myTable">
                    <caption>
                        Description of the table.
                    </caption>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Department Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $dp = $department_model->getAllDepartment();
                          $number = 1;
                      
                           foreach ($dp as $dept):
                            $status = 'Active';
                            $btnLabel = 'Archive';
                            $classState = 'text-primary';
                            $archive = 1;
                            if($dept['isArchive'] == 1){
                              $status = 'Archived';
                              $btnLabel = 'Unarchived';
                              $classState = 'text-danger';
                              $archive = 0;
                            }

                            if($dept['isDeleted' ] == 1){
                              $archive = 0;
                            }
                        ?>
                        <tr>
                            <td><?= $number?></td>
                            <td><?= $dept['department_name']?></td>
                            <td class="<?= $classState?>"><?= $status?></td>
                            <td>
                                <button type="button" class="btn btn-primary me-2 EditDepartmentBtn" id="" data-bs-dept="<?= $dept['department_name']?>" data-bs-id="<?= $dept['department_id']?>" data-bs-toggle="modal" data-bs-target="#EditDepartmentModal">Edit</button>
                                <button type="button" class="btn btn-danger me-2 DeleteDepartmentBtn" data-bs-id="<?= $dept['department_id']?>" data-bs-toggle="modal" data-bs-target="#DeleteDepartmentModal" data-bs-dept="<?= $dept['department_name']?>" data-bs-id="<?= $dept['department_id']?>" data-bs-delete-dept="<?= $archive?>">delete</button>
                                <button type="button" class="btn btn-secondary ArchiveDeptBtn" data-bs-archive-dept="<?= $archive?>" data-bs-id="<?= $dept['department_id']?>" ><?= $btnLabel?></button>
                                
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
<div class="modal fade" id="DepartmentModal" tabindex="-1" aria-labelledby="DepartmentModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="DepartmentTitle">Add New Department</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Department Name:</label>
                <input type="text" class="form-control" id="DepartmentInput" placeholder="(e.g. IT Department)">
            </div>

       </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveDepartment" data-bs-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="EditDepartmentModal" tabindex="-1" aria-labelledby="EditDepartmentModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditDepartmentTitle">Edit Department</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">       
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label editActvity"></label>
                <input type="text" class="form-control" id="EditDepartmentInput" placeholder="(e.g. IT Department)">
                <input type="hidden" id="EditDepartmentID">
            </div>
       </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="editDepartment" data-bs-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeleteDepartmentModal" tabindex="-1" aria-labelledby="DeleteDepartmentModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="DeleteDepartmentTitle">Delete Department</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            
       Are you sure you want to delete <span id="dp_name"></span> ?
       <input type="hidden" id="DeleteDepartmentID">
       <input type="hidden" id="DeleteDepartmentValue">
       </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delDepartment" data-bs-dismiss="modal">Delete</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){

    let dept_name;
    let dept_id;
    let archive_value = 0;
    let delete_value = 0;
    $("#saveDepartment").click(function(){
      dept_name = $("#DepartmentInput").val();
      addDepartment(dept_name);
    });

    $(".EditDepartmentBtn").click(function(){
      dept_name = $(this).data('bs-dept');
      dept_id =  $(this).data('bs-id');

      $("#EditDepartmentModal").find("#EditDepartmentInput").val(dept_name);
      $("#EditDepartmentModal").find("#EditDepartmentID").val(dept_id);
     
    });

    $("#editDepartment").click(function(){
      dept_name = $("#EditDepartmentInput").val();
      dept_id = $("#EditDepartmentID").val();
      editDepartment(dept_name, dept_id);
 
    });

    $(".ArchiveDeptBtn").click(function(){
        archive_value =  $(this).data('bs-archive-dept');
        dept_id =  $(this).data('bs-id');
        archiveDept(dept_id, archive_value)
       
    });

    $(".DeleteDepartmentBtn").click(function(){
      dept_name = $(this).data('bs-dept');
      dept_id =  $(this).data('bs-id');
      delete_value = $(this).data('bs-delete-dept');
      $("#DeleteDepartmentModal").find("#dp_name").text(dept_name);
      $("#DeleteDepartmentModal").find("#DeleteDepartmentID").val(dept_id);
      $("#DeleteDepartmentModal").find("#DeleteDepartmentValue").val(delete_value);
 
      
    });

    $("#delDepartment").click(function(){
      dept_id = $("#DeleteDepartmentID").val();
      delete_value = $("#DeleteDepartmentValue").val();
      deleteDept(dept_id, delete_value);
    

    });

  });

  function addDepartment(dept_name){
    $.ajax({
      type: 'POST',
      url: '../controller/DepartmentController.php',
      data: {
        department_name: dept_name,
      },
      success: function(response){
        if(response === 'success'){
          alert("Inserted Successfully");
          location.reload();
        }else{
          alert("Failed to insert")
        }
      },
      error: function (error){
        console.log(error);
      }
    });
  }

  function editDepartment(dept_name, dept_id){
        $.ajax({
            type: 'POST',
            url: '../Controller/DepartmentController.php',
            data: {
                edit_department: dept_name,
                edit_department_id: dept_id,
            },
            success: function(response){
                if(response === 'success'){
                    alert("Edited Successfully");
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

    function archiveDept(dept_id, archive_value){
        $.ajax({
            type: 'POST',
            url: '../Controller/DepartmentController.php',
            data: {
                archive_dept_id: dept_id,
                archive_dept_value: archive_value
            },
            success: function(response){
                if(response === 'success'){
                    alert("Status has been successfully change");
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

    function deleteDept(dept_id, delete_value){
    
        $.ajax({
            type: 'POST',
            url: '../Controller/DepartmentController.php',
            data: {
                delete_dept_id: dept_id,
                delete_dept_value: delete_value
            },
            success: function(response){
                if(response === 'success'){
                    alert("Deleted Successfully");
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
    require_once ('AdminFooter.php');
?>