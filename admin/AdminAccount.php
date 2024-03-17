<?php

require_once('AdminHeader.php');
require_once('../Model/UserlevelModel.php');
require_once('../Model/AdminAccountModel.php');
$admin_model = new AdminAccountModel();
if (isset($_SESSION['admin_management_view']) && $_SESSION['admin_management_view'] == 1) {


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

            <button class="btn btn-primary <?= $addState ?>" type="button" data-bs-toggle="modal" data-bs-target="#ActivityModal">Add New</button>
        </div>



        <table class="table" id="table_admin">
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
                    <!-- <th>Condition</th> -->
                    <?php
                    // if(isset($_SESSION["admin_management_update"]) && $_SESSION["admin_management_update"]== 1 && isset($_SESSION["admin_management_delete"]) && $_SESSION["admin_management_delete"] == 1 && isset($_SESSION["admin_management_update"]) && $_SESSION["admin_management_update"] == 1 ){
                    ?>
                    <th class="<?= $hide_action ?>">Action</th>
                    <?php
                    // }
                    ?>
                </tr>
            </thead>
            <tbody id="table_body_container">
                <?php
                //    $admin = $admin_model->getAllAdmin();
                //    $number = 1;
                //    $isFirstRow = true;
                // foreach($admin as $ad):
                //     $condition = 'Active';
                //     $btnText = 'Archive';
                //     $status = 'offline';
                //     $statusClass = '';
                //     if($ad['isArchive'] == 1){
                //         $condition = 'Archive';
                //         $btnText = 'Unarchive';
                //     }
                //     if($ad['status'] == 1){
                //         $status = 'Online';
                //         $statusClass = 'text-primary';
                //     }
                ?>
                <!-- <tr >
                <td class="no"></td>
                <td class="admin_id"></td>
                <td class="admin_name"></td>
                <td class="userlevel_name"></td>
                <td class="stats"></td>
                <td class="condition"></td>
                <td class="btn_container">

                    <button type="button" class="btn btn-primary me-2 EditAccountBtn <?= $editState ?>" id=""
                        data-bs-type="" data-bs-id="" data-bs-toggle="modal"
                        data-bs-target="#EditAccountModal">Edit</button>
                    <button type="button" class="btn btn-danger me-2 RemoveAccountBtn <?= $addState ?>" data-bs-id=""
                        >Remove</button>
                    <button type="button" class="btn btn-secondary <?= $addState ?>" data-bs-id=""
                       ></button>

                </td>

            </tr> -->
                <?php
                //   $isFirstRow = false;
                //   $number++;
                //   endforeach;
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
                                            <option selected disabled value=0>Userlevel</option>
                                            <?php
                                            $userlevel_model = new UserlevelModel();
                                            $ul_model = $userlevel_model->getAllUserlevel();

                                            foreach ($ul_model as $ul) :
                                            ?>
                                                <option value="<?= $ul['userlevel_id'] ?>"><?= $ul['userlevel_name'] ?>
                                                </option>
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
                    <div class="d row align-items-center justify-content-center g-0 px-4 px-sm-0 p-4   w-sm-100" style=" width: 100%;">
                        <div class="col col-sm-6 col-lg-7 col-xl-6">
                            <div class="text-center mb-5">
                                <p class="h3 fw-bold text-primary">Register</p>
                                <p class="text-secondary">Create Admin Account</p>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <input type="hidden" name="" id="edit_admin_id" class="regInputField form-control form-control-lg fs-6 " placeholder="Admin ID" value="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="" id="edit_admin_username" class="regInputField form-control form-control-lg fs-6 " value="" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="" id="edit_admin_name" class="regInputField form-control form-control-lg fs-6 " value="" placeholder=" Name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" name="" id="edit_admin_surname" class="regInputField form-control form-control-lg fs-6 " value="" placeholder="Surname">
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        </span>
                                        <select class="form-select edit_admin_select_userlevel" id="edit_admin_select_userlevel" aria-label="Default select department">
                                            <!-- <option selected disabled value=""></option> -->

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            getAdmin();

            let admin_id, admin_username, admin_name, admin_surname, admin_completename, userlevel = 0;

            $(".admin_select_userlevel").change(function() {
                userlevel = $(this).val()
            });

            $("#admin_id").on("input", function() {
                $(this).val($(this).val().toUpperCase());
            });
            var userLevels;
            // Check if userLevels is already populated
            if (!userLevels) {
                getAlluserlevel();
            }


            function getAlluserlevel() {
                $.ajax({
                    type: 'POST',
                    url: "../Controller/UserlevelController.php",
                    data: {
                        userlevel: 'userlvl',
                    },
                    dataType: 'json',
                    success: function(data) {
                        userLevels = data;

                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }


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

                registerEmployee(admin_id, admin_username, admin_completename, userlevel)

            });



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
                            $("#table_admin").DataTable().destroy();
                            getAdmin();
                        } else if (response.status === 'validate') {
                            alert("ID Already exist");

                        } else {
                            alert("Failed to register");
                        }

                    },
                    error: function(error) {
                        console.error(jqXHR, textStatus, errorThrown);
                    }

                });
            }







            function removeAdmin(admin_id) {
                $.ajax({
                    type: 'POST',
                    url: '../Controller/AdminAccountController.php',
                    data: {
                        remove_admin_id: admin_id,
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response === 'success') {
                            alert("Admin has been deleted");
                            $("#table_admin").DataTable().destroy();
                            getAdmin();
                        } else if (response === 'failed') {
                            alert("Failed to delete");
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(jqXHR, textStatus, errorThrown);
                    }
                });
            }

            function restrictAdmin(admin_id, value){
            
                $.ajax({
                    type: 'POST',
                    url: '../Controller/AdminAccountController.php',
                    data: {
                        restrict_admin: admin_id,
                        data_value: value
                    },
                    dataType: 'json',
                    success: function(result){
                        if(result != false){
                            $("#table_admin").DataTable().destroy();
                            getAdmin();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(jqXHR, textStatus, errorThrown);
                    }
                });
            }



            function getAdmin() {
                $.ajax({
                    type: 'POST',
                    url: '../Controller/AdminAccountController.php',
                    data: {
                        get_all: 'load_admin_accounts'
                    },
                    dataType: 'json',
                    success: function(data) {


                        $("#table_admin").DataTable({
                            "data": data,
                            "responsive": true,
                            "columns": [{
                                    "data": null,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return meta.row + 1;
                                    }

                                },
                                {
                                    "data": "admin_id"
                                },
                                {
                                    "data": "admin_name"
                                },
                                {
                                    "data": "userlevel_name"
                                },
                                {
                                    "data": "isArchive",
                                    "render": function(data, type, row, meta) {

                                        if (data == 1) {
                                            return '<span class="text-danger">Restricted</span>';
                                        } else {
                                            return '<span class="text-success">Active</span>';
                                        }
                                    }
                                },
                                {
                                    "data": "admin_id",
                                    "render": function(data, type, row, meta) {
                                        var buttons = '';

                                        // Check if it's the first row (index 0)
                                        if (meta.row === 0) {
                                            // If it's the first row, disable or hide the buttons
                                            buttons += 'No action allowed';
                                        } else {
                                            // If it's not the first row, render the buttons normally
                                            buttons += '<button type="button" class="btn btn-outline-primary EditAccountBtn me-2" data-bs-id="' + data + '" data-bs-toggle="modal" data-bs-target="#EditAccountModal">Edit</button>' +
                                                '<button type="button" class="btn btn-outline-danger RemoveAccountBtn me-2" data-bs-id="' + data + '">Remove</button>';
                                            if (row.isArchive == 1) {
                                                buttons += '<button type="button" class="btn btn-outline-warning ArchiveAccountBtn" data-bs-id="' + data + '" data-bs-value="0">Unrestrict</button>';
                                            } else {
                                                buttons += '<button type="button" class="btn btn-outline-secondary ArchiveAccountBtn" data-bs-id="' + data + '" data-bs-value="1">Restrict</button>';
                                            }
                                        }

                                        return buttons;
                                    }
                                }
                            ],
                        });



                        $("#table_admin").on("click", ".EditAccountBtn", function() {
                            admin_id = $(this).data("bs-id");
                            getAdminById(admin_id, data);

                        });



                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            }


            $("#table_admin").on("click", ".RemoveAccountBtn", function() {
                admin_id = $(this).data('bs-id');
                // console.log(admin_id);
                removeAdmin(admin_id);
            });
            
            $("#table_admin").on("click", ".ArchiveAccountBtn", function() {
                admin_id = $(this).data('bs-id');
                let val = $(this).data('bs-value');
                // console.log(val);
                restrictAdmin(admin_id, val);
            });

            function getAdminById(admin_id, result) {
                const admin = result.find(item => item.admin_id === admin_id);

                if (admin) {
                    // console.log('Admin found:', admin);
                    // Split admin name into first name and surname
                    let nameArray = admin.admin_name.split(' ');
                    let name = nameArray[0];
                    let surname = nameArray.slice(1).join(' ');

                    // Set values for username, name, and surname fields in the modal
                    $('#EditAccountModal').find("#edit_admin_username").val(admin.credential_surname);
                    $('#EditAccountModal').find("#edit_admin_name").val(name);
                    $('#EditAccountModal').find("#edit_admin_surname").val(surname);
                    $('#EditAccountModal').find("#editAccountSaveBtn").val(admin_id);
                    // Populate user level select dropdown
                    let userLevelSelect = $(".edit_admin_select_userlevel");
                    userLevelSelect.empty(); // Clear existing options before populating again

                    // Add options using the existing userLevels data
                    $.each(userLevels, function(index, userLevel) {
                        // Append option to the select element
                        let option = $('<option>', {
                            value: userLevel.userlevel_id,
                            text: userLevel.userlevel_name
                        });

                        // Set selected attribute if the userlevel_id matches admin's userlevel_id
                        if (userLevel.userlevel_id === admin.userlevel_id) {
                            option.attr('selected', 'selected');
                        }

                        userLevelSelect.append(option);
                    });





                } else {
                    console.log('Admin not found.');
                }
            }

            $(document).on('click', '#editAccountSaveBtn', function() {
                // alert('click');
                admin_id = $(this).val();
                editAdmin(admin_id);
            });

            function editAdmin(
                admin_id) {
                // console.log(admin_id);
                admin_username = $('#EditAccountModal').find("#edit_admin_name").val();
                admin_name = $('#EditAccountModal').find("#edit_admin_username").val();
                admin_surname = $('#EditAccountModal').find("#edit_admin_name").val();
                admin_completename = `${admin_name} ${admin_surname}`;
                userlevel_ed = $(".edit_admin_select_userlevel").val();
                $(".edit_admin_select_userlevel").change(function() {
                    userlevel_ed = $(this).val()
                });


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
                            $("#table_admin").DataTable().destroy();
                            getAdmin();
                        } else if (response.status === 'failed') {
                            alert("Failed to update");
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
require_once('AdminFooter.php');

?>

?>