<?php

    require_once ('AdminHeader.php');


?>
            <div class="table-responsive">
                <div class="d-flex flex-row p-2 align-items-center">
                    <p class="h4 mb-0 me-2">Userlevel Permission</p>
                    <button class="btn btn-outline-secondary rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#ActivityModal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
                           
                <table class="table table-sm">
                    <caption>
                        Description of the table.
                    </caption>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Userlevel Name</th>
                            <th>Userlevel</th>     
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           
                        ?>
                        <tr>
                            <td>1</td>
                            <td>Superadmin</td>
                            <td>Super Admin</td>
                            <td>Active</td>
                            <td>
                                <button type="button" class="btn btn-primary me-2 EditActivityBtn" id="" data-bs-type="" data-bs-id="" data-bs-toggle="modal" data-bs-target="#EditActivityModal">Edit</button>
                                <button type="button" class="btn btn-danger me-2 DeleteActivityBtn" data-bs-id="">delete</button>
                                <button type="button" class="btn btn-secondary" data-bs-id="">Archive</button>
                                
                            </td>
                        </tr>
                        <?php
                          
                        ?>
                   
                    </tbody>
                </table>
            </div>


<!-- Modal -->
<div class="modal fade" id="ActivityModal" tabindex="-1" aria-labelledby="ActivityModal" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ActivityTitle">Add Userlevel</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="container-fluid">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Permission Name</label>
                    <input type="text" class="form-control" id="ActivityTypeInput" placeholder="(e.g. Secretary)">
                </div>
                <div class="table-responsive">
                    <table class="table table-md table-hover table-striped ">
                        <thead>
                            <tr>
                            <th scope="col">Permission</th>
                            <th scope="col">View</th>
                            <th scope="col">Add</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Archive</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr>
                                <td>Employee</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            </tr>
                            <tr>
                                <td>Attendance Monitoring</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            </tr>
                            <tr>
                                <td>Activity Module</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            </tr>
                            <tr>
                                <td>Activity Module</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            </tr>
                            <tr>
                                <td>Activity Module</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
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
?>