<?php

    require_once ('AdminHeader.php');
    require_once ('../Model/UserlevelModel.php');
    require_once ('../Model/AdminAccountModel.php');
    $admin_model = new AdminAccountModel();
    if(isset($_SESSION['admin_management_view']) && $_SESSION['admin_management_view'] == 1){


?>
<style>
    .divider-content-center {
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
isset($_SESSION['admin_management_create']) && $_SESSION['admin_management_create'] == 1 ? ($addState = ' ') : ($addState = 'd-none');
isset($_SESSION['admin_management_update']) && $_SESSION['admin_management_update'] == 1 ? ($editState = ' ') : ($editState = 'd-none');
isset($_SESSION['admin_management_delete']) && $_SESSION['admin_management_delete'] == 1 ? ($state = ' ') : ($state = 'd-none');
isset($_SESSION['admin_management_archive']) && $_SESSION['admin_management_archive'] == 1 ? ($state = ' ') : ($state = 'd-none');

$isAllowed = isset($_SESSION['admin_management_create']) && $_SESSION['admin_management_create'] == 1 && isset($_SESSION['admin_management_update']) && $_SESSION['admin_management_update'] == 1 && isset($_SESSION['admin_management_delete']) && $_SESSION['admin_management_delete'] == 1 && isset($_SESSION['admin_management_archive']) && $_SESSION['admin_management_archive'] == 1 ? ($hide_action = ' ') : ($hide_action = 'd-none');

?>
<div class="table-responsive">
    <div class="d-flex flex-row p-2 align-items-center">
        <p class="h4 mb-0 me-2">Admin</p>

        <button class="btn btn-primary <?= $addState ?>" type="button" data-bs-toggle="modal"
            data-bs-target="#ActivityModal">Add New</button>
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
                <th class="<?= $hide_action ?>">Action</th>
                <?php
                // }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                           $admin = $admin_model->getAllAdmin();
                           $number = 1;
                           $isFirstRow = true;   
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
                <td><?= $number ?></td>
                <td><?= $ad['admin_id'] ?></td>
                <td><?= $ad['admin_name'] ?></td>
                <td><?= $ad['userlevel_name'] ?></td>
                <td class="<?= $statusClass ?>"><?= $status ?></td>
                <td><?= $condition ?></td>
                <td class="<?= $hide_action ?>">

                    <button type="button" class="btn btn-primary me-2 EditAccountBtn <?= $editState ?>" id=""
                        data-bs-type="" data-bs-id="<?= $ad['admin_id'] ?>" data-bs-toggle="modal"
                        data-bs-target="#EditAccountModal" <?= $isFirstRow ? 'disabled' : '' ?>>Edit</button>
                    <button type="button" class="btn btn-danger me-2 RemoveAccountBtn <?= $addState ?>" data-bs-id="<?= $ad['admin_id'] ?>"
                        <?= $isFirstRow ? 'disabled' : '' ?>>Remove</button>
                    <button type="button" class="btn btn-secondary <?= $addState ?>" data-bs-id="<?= $ad['admin_id'] ?>"
                        <?= $isFirstRow ? 'disabled' : '' ?>><?= $btnText ?></button>

                </td>

            </tr>
            <?php
                          $isFirstRow = false; 
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
                <div class="d row align-items-center justify-content-center g-0 px-4 px-sm-0 p-4   w-sm-100"
                    style=" width: 100%;">
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
                                    <input type="text" name="" id="admin_id"
                                        class="regInputField form-control form-control-lg fs-6 " placeholder="Admin ID">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <input type="text" name="" id="admin_username"
                                        class="regInputField form-control form-control-lg fs-6 " placeholder="Username">
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <input type="text" name="" id="admin_name"
                                        class="regInputField form-control form-control-lg fs-6 " placeholder=" Name">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <input type="text" name="" id="admin_surname"
                                        class="regInputField form-control form-control-lg fs-6 " placeholder="Surname">
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    </span>
                                    <select class="form-select admin_select_userlevel"
                                        aria-label="Default select department">
                                        <option selected disabled value=0>Userlevel</option>
                                        <?php 
                                    $userlevel_model = new UserlevelModel();
                                    $ul_model = $userlevel_model->getAllUserlevel();

                                    foreach( $ul_model as $ul ):
                                ?>
                                        <option value="<?= $ul['userlevel_id'] ?>"><?= $ul['userlevel_name'] ?></option>
                                        <?php
                                    endforeach;
                                ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-outline-primary btn-lg w-100" id="registerBtn"
                            data-bs-dismiss="modal">
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


<div class="modal fade" id="EditAccountModal" tabindex="-1" aria-labelledby="EditAccountModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditAccountModalTitle">Edit Activity Type</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container-fluid" id="bodyEdit">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editAccountSaveBtn" data-bs-dismiss="modal">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        let admin_id, admin_username, admin_name, admin_surname, admin_completename, userlevel = 0;

        $(".admin_select_userlevel").change(function() {
            userlevel = $(this).val()
        });
        $("#admin_id").on("input", function() {
            $(this).val($(this).val().toUpperCase());
        });

        $("#registerBtn").click(function() {
            admin_id = $("#admin_id").val();
            admin_username = $("#admin_username").val();
            admin_name = $("#admin_name").val();
            admin_surname = $("#admin_surname").val();
            admin_completename = `${admin_name} ${admin_surname}`;

            if (!admin_id || !admin_completename.trim() || !admin_username) {
                alert("Please fill in all required fields");
                return;
            }
            if (userlevel == 0 || userlevel == undefined) {
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

            registerEmployee(admin_id, admin_username, admin_completename, userlevel)

        });

        // edit button




        function registerEmployee(admin_id, admin_username, admin_completename, userlevel) {
            $.ajax({
                type: 'POST',
                url: '../Controller/AdminAccountController.php',
                data: {
                    admin_id: admin_id,
                    admin_username: admin_username,
                    admin_completename: admin_completename,
                    userlevel: userlevel
                },
                success: function(response) {
                    console.log(response);
                    if (response.status === 'error') {
                        if (response.errors.already_exist) {
                            alert(response.errors.already_exist);
                        }
                        if (response.errors.format_id) {
                            alert(response.errors.format_id);
                        }

                    } else if (response.status === 'success') {
                        alert("Employee registered successfully");
                        location.reload();
                    } else {
                        alert("Failed to register");
                    }

                },
                error: function(error) {
                    console.error(jqXHR, textStatus, errorThrown);
                }

            });
        }


        $(".EditAccountBtn").click(function() {
            admin_id = $(this).data('bs-id');
            getAdminById(admin_id);

        });

        function getAdminById(admin_id) {
            $.ajax({
                type: 'GET',
                url: '../Controller/AdminAccountController.php',
                data: "admin_id=" + admin_id,
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    let Body = $('#bodyEdit');
                    let firstResult = result.admin[0];

                    let nameArray = firstResult.admin_name.split(' ');
                    let name = nameArray[0];
                    let surname = nameArray.slice(1).join(' ');
                    let userLevelOptions = '';

                    // Use a loop to add each option to the userLevelOptions string
                    for (let i = 0; i < result.userlevel.length; i++) {
                        if (result.userlevel[i].userlevel_id === firstResult.userlevel_id) {
                            continue;
                        }
                        userLevelOptions +=
                            `<option value="${result.userlevel[i].userlevel_id}">${result.userlevel[i].userlevel_name}</option>`;
                    }
                    Body.empty();

                    Body.html(`<div class="d row align-items-center justify-content-center g-0 px-4 px-sm-0 p-4   w-sm-100" style=" width: 100%;">
                    <div class="col col-sm-6 col-lg-7 col-xl-6">
                        <div class="text-center mb-5">
                            <p class="h3 fw-bold text-primary">Register</p>
                            <p class="text-secondary">Create Admin Account</p>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <input type="hidden" name="" id="edit_admin_id" class="regInputField form-control form-control-lg fs-6 " placeholder="Admin ID" value="${firstResult .admin_id}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <input type="text" name="" id="edit_admin_username" class="regInputField form-control form-control-lg fs-6 " value="${firstResult.credential_surname}" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <input type="text" name="" id="edit_admin_name" class="regInputField form-control form-control-lg fs-6 " value="${name}" placeholder=" Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <input type="text" name="" id="edit_admin_surname" class="regInputField form-control form-control-lg fs-6 " value="${surname}"  placeholder="Surname" >
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    </span>
                                    <select class="form-select edit_admin_select_userlevel" aria-label="Default select department">
                                        <option selected disabled value="${firstResult.userlevel_id}">${firstResult.userlevel_name}</option>
                                        ${userLevelOptions}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`);

                    // Moved userlevel_ed declaration to the top of the function
                    let userlevel_ed = firstResult.userlevel_id; // Set initial value here
                    Body.find('.edit_admin_select_userlevel').on('change', function() {
                        userlevel_ed = $(this).val();
                    });

                    $("#editAccountSaveBtn").click(function() {
                        admin_id = $("#edit_admin_id").val();
                        admin_username = $("#edit_admin_username").val();
                        admin_name = $("#edit_admin_name").val();
                        admin_surname = $("#edit_admin_surname").val();
                        admin_completename = `${admin_name} ${admin_surname}`;
                        editAdmin(
                            admin_id,
                            admin_username,  
                            admin_completename,
                            userlevel_ed);
                    });


                },
                error: function(error) {
                    console.log("error:" + error);
                }
            });
        }

        function editAdmin(
                            admin_id,
                            admin_username,  
                            admin_completename,
                            userlevel_ed)
        {


            $.ajax({
                type: 'POST',
                url: '../Controller/AdminAccountController.php',
                data: {
                    edit_admin_id: admin_id,
                    edit_admin_username: admin_username,
                    edit_admin_completename: admin_completename,
                    edit_userlevel: userlevel_ed
                },
                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {
                        alert("Updated successfully");
                        location.reload();
                    } else if (response.status === 'failed'){
                        alert("Failed to update");
                    }

                },
                error: function(error) {
                    console.error(jqXHR, textStatus, errorThrown);
                }
            });
        }


        $(".RemoveAccountBtn").click(function(){
                        admin_id = $(this).data('bs-id');

                        removeAdmin(admin_id);
                    });

        function removeAdmin(admin_id){
            $.ajax({
                type: 'POST',
                url: '../Controller/AdminAccountController.php',
                data: {
                    remove_admin_id: admin_id,
                }, 
                success: function(response) {
                    console.log(response);
                    if (response === 'success') {
                        alert("Admin has been deleted");
                        location.reload();
                    } else if (response === 'failed'){
                        alert("Failed to delete");
                    }

                },
                error: function(error) {
                    console.error(jqXHR, textStatus, errorThrown);
                }
            });
        }

    });
</script>
<?php
}
    require_once ('AdminFooter.php');

?>
