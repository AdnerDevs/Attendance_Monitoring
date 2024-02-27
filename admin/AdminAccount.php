<?php

    require_once ('AdminHeader.php');
    require_once ('../Model/UserlevelModel.php');
    require_once ('../Model/AdminAccountModel.php');
    $admin_model = new AdminAccountModel();
    if(isset($_SESSION['admin_management_view']) && $_SESSION['admin_management_view'] == 1){


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
<?php
                                    isset($_SESSION['admin_management_create']) && $_SESSION["admin_management_create"] == 1 ? $addState = " ": $addState = "d-none";
                                    isset($_SESSION['admin_management_update']) && $_SESSION["admin_management_update"] == 1 ? $editState = " ": $editState = "d-none";
                                    isset($_SESSION['admin_management_delete']) && $_SESSION["admin_management_delete"] == 1 ? $state = " ": $state = "d-none";
                                    isset($_SESSION['admin_management_archive']) && $_SESSION["admin_management_archive"] == 1 ? $state = " ": $state = "d-none";
                                   
                                    $isAllowed = (
                                        isset($_SESSION['admin_management_create']) && $_SESSION['admin_management_create'] == 1 &&
                                        isset($_SESSION['admin_management_update']) && $_SESSION['admin_management_update'] == 1 &&
                                        isset($_SESSION['admin_management_delete']) && $_SESSION['admin_management_delete'] == 1 &&
                                        isset($_SESSION['admin_management_archive']) && $_SESSION['admin_management_archive'] == 1
                                    ) ? $hide_action = ' ' : $hide_action = 'd-none';
                                                                                                     
?>
            <div class="table-responsive">
                <div class="d-flex flex-row p-2 align-items-center">
                    <p class="h4 mb-0 me-2">Admin</p>

                    <button class="btn btn-primary <?=$addState?>" type="button" data-bs-toggle="modal" data-bs-target="#ActivityModal">Add New</button>
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
                            <th>Condition</th>
                            <?php
                            // if(isset($_SESSION["admin_management_update"]) && $_SESSION["admin_management_update"]== 1 && isset($_SESSION["admin_management_delete"]) && $_SESSION["admin_management_delete"] == 1 && isset($_SESSION["admin_management_update"]) && $_SESSION["admin_management_update"] == 1 ){
                                        
                            ?>
                            <th class="<?=$hide_action?>">Action</th>
                            <?php
                            // }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           $admin = $admin_model->getAllAdmin();
                           $number = 1;  
                        foreach($admin as $ad):
                            $condition = 'Active';
                            $btnText = 'Archive';
                            $status = 'offline';
                            $statusClass = '';
                            if($ad['isArchive'] == 1){
                                $condition = 'Archive';
                                $btnText = 'Unarchive';
                            }
                            if($ad['status'] == 1){
                                $status = 'Online';
                                $statusClass = 'text-primary';
                            }
                        ?>
                        <tr>
                            <td><?=$number?></td>
                            <td><?=$ad['admin_id']?></td>
                            <td><?=$ad['admin_name']?></td>
                            <td><?=$ad['userlevel_name']?></td>
                            <td class="<?=$statusClass?>"><?=$status?></td>
                            <td><?=$condition?></td>
                            <td class="<?=$hide_action?>">
                          
                                <button type="button" class="btn btn-primary me-2 EditActivityBtn <?=$editState?>" id="" data-bs-type="" data-bs-id="" data-bs-toggle="modal" data-bs-target="#EditActivityModal">Edit</button>
                                <button type="button" class="btn btn-danger me-2 DeleteActivityBtn <?=$addState?>" data-bs-id="">delete</button>
                                <button type="button" class="btn btn-secondary <?=$addState?>" data-bs-id=""><?=$btnText?></button>
                                
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
                            <input type="text" name="" id="admin_id" class="regInputField form-control form-control-lg fs-6 " placeholder="Admin ID">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="admin_username" class="regInputField form-control form-control-lg fs-6 " placeholder="Username">
                        </div>
                    </div>
               

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="admin_name" class="regInputField form-control form-control-lg fs-6 " placeholder=" Name">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="admin_surname" class="regInputField form-control form-control-lg fs-6 " placeholder="Surname">
                        </div>
                    </div>
                    <div class="col-12 ">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </span>
                            <select class="form-select admin_select_userlevel" aria-label="Default select department">
                                <option selected disabled value=0 >Userlevel</option>
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

                    <button type="button" class="btn btn-outline-primary btn-lg w-100" id="registerBtn" data-bs-dismiss="modal">
                        Register
                    </button>
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
    let admin_id;
    let admin_username;
    let admin_name ;
    let admin_surname;
    let admin_completename ;
    let userlevel = 0;

    $(".admin_select_userlevel").change(function(){
       userlevel = $(this).val()
    });
    $("#admin_id").on("input",function(){
        $(this).val($(this).val().toUpperCase());
    });

    $("#registerBtn").click(function(){
            admin_id = $("#admin_id").val();
            admin_username = $("#admin_username").val();
            admin_name = $("#admin_name").val();
            admin_surname = $("#admin_surname").val();
            admin_completename = `${admin_name} ${admin_surname}`;

            if (!admin_id || !admin_completename.trim() || !admin_username ) {
                alert("Please fill in all required fields");
                return;
            }
            if(userlevel == 0 || userlevel == undefined){
                alert("Please asign a userlevel");
                return;
            }
            console.log({
                admin_id,
                admin_username,
                admin_name,
                admin_surname,
                admin_completename,
                userlevel
            });

            registerEmployee(admin_id, admin_username, admin_completename, userlevel )

        });

});

function registerEmployee(admin_id, admin_username, admin_completename, userlevel ){
        $.ajax({
            type: 'POST',
            url: '../Controller/AdminAccountController.php',
            data: {
                admin_id: admin_id,
                admin_username: admin_username,
                admin_completename: admin_completename,
                userlevel: userlevel
            },
            success: function(response){
                console.log(response);
                if (response.status === 'error') {
                    if(response.errors.already_exist){
                        alert(response.errors.already_exist);
                    }
                    if(response.errors.format_id){
                        alert(response.errors.format_id);
                    }
                   
                } else if (response.status === 'success'){
                    alert("Employee registered successfully");
                    location.reload();
                }else{
                    alert("Failed to register");
                }

            },
            error: function(error){
                console.log(error);
            }

        });
    }
</script>
<?php
}
    require_once ('AdminFooter.php');

?>