<?php

    require_once ('AdminHeader.php');
    require_once ('../Model/UserlevelModel.php');
  
?>
<style>
      .divider-content-center{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        background-color: #fff;
        font-size: 0.8rem;
        font-weight: 500;
        color: #999;
    }

</style>

            <div class="table-responsive">
                <div class="d-flex flex-row p-2 align-items-center">
                    <p class="h4 mb-0 me-2">Admin</p>

                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#ActivityModal">Add New</button>
                </div>
                    
         
                
                <table class="table display" id="myTable">
                    <!-- <caption>
                        Description of the table.
                    </caption> -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Admin id</th>
                            <th>Admin Name</th>
                            <th>Userlevel</th>     
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-primary me-2 EditActivityBtn" id="" data-bs-type="" data-bs-id="" data-bs-toggle="modal" data-bs-target="#EditActivityModal">Edit</button>
                                <button type="button" class="btn btn-danger me-2 DeleteActivityBtn" data-bs-id="">delete</button>
                                <button type="button" class="btn btn-secondary" data-bs-id=""></button>
                                
                            </td>
                        </tr>
                        <?php
                          
                        ?>
                   
                    </tbody>
                </table>
            </div>


<!-- Modal -->
<div class="modal fade" id="ActivityModal" tabindex="-1" aria-labelledby="ActivityModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ActivityTitle">Register Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="d row align-items-center justify-content-center g-0 px-4 px-sm-0 p-4   w-sm-100" style=" width: 100%;">
            <!-- <div class="alert alert-primary" role="alert">
              
            </div> -->
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <a href="" class="d-flex justify-content-center mb-4">
                        <img src="asset/img/herogram.jpg" alt="" width="60" class="rounded-circle">
                        
                    </a>

                    <div class="text-center mb-5">
                        <p class="h3 fw-bold text-primary">Register</p>
                        <p class="text-secondary">Create Admin Account</p>
                    </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-id-badge" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_id" class="regInputField form-control form-control-lg fs-6 " placeholder="Admin ID">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_surname" class="regInputField form-control form-control-lg fs-6 " placeholder="Username">
                        </div>
                    </div>
               

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_name" class="regInputField form-control form-control-lg fs-6 " placeholder=" Name">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_surname" class="regInputField form-control form-control-lg fs-6 " placeholder="Surname">
                        </div>
                    </div>

                    <!-- <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                            <input type="password" name="" id="emp_nName" class="regInputField form-control form-control-lg fs-6 " placeholder="Password">
                        </div>
                    </div> -->

                    <div class="col-12 ">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </span>
                            <select class="form-select" aria-label="Default select department">
                                <option selected disabled>Userlevel</option>
                                <?php 
                                    $userlevel_model = new UserlevelModel();
                                    $ul_model = $userlevel_model->getAllUserlevel();

                                    foreach( $ul_model as $ul ):
                                ?>
                                <option value="<?=$ul['userlevel_id']?>"><?=$ul['userlevel_name']?></option>
                                <?php
                                    endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>



                    <button type="button" class="btn btn-outline-primary btn-lg w-100" id="registerBtn">
                        Register
                    </button>

                    <!-- <div class="position-relative">
                        <hr class="text-secondary divider">
                        <div class="divider-content-center">or</div>
                    </div>
                    <button type="button" class="btn btn-outline-secondary btn-lg w-100" >
                        <a href="/Attendance_Monitoring/"  style="text-decoration: none !important; color: inherit;">Login</a>
                    </button> -->
                </div>
            </div>
       </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary" id="saveActivity" data-bs-dismiss="modal">Save changes</button> -->
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
$(document).ready(function(){
//     var data = [
//     [
//         "1",
//         "12134",
//         "Edinburgh",
//         "Superadmin",
//         "Active",
//         "9"
        
//     ],
//     [
//         "2",
//         "12134",
//         "Esge",
//         "Admin",
//         "Active",
//         "9"
//     ]
// ]


});
</script>
<?php
    require_once ('AdminFooter.php');
?>