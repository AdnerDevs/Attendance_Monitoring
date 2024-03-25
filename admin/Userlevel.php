<?php

require_once ('AdminHeader.php');
require_once ('../Model/UserlevelModel.php');

$userlevel_model = new UserlevelModel();

?>
<div class="table-responsive">
    <div class="d-flex flex-row p-2 align-items-center">
        <p class="h4 mb-0 me-2">Userlevel Permission</p>
        <button class="btn btn-outline-secondary rounded-circle" type="button" id="create_userlevel"
            data-bs-toggle="modal" data-bs-target="#ActivityModal"><i class="fa fa-plus"
                aria-hidden="true"></i></button>
    </div>

    <table class="table table-sm" id="table_userlevel">
        <thead>
            <tr>
                <th>No</th>
                <th>Userlevel Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //    $userlevel = $userlevel_model->getAllUserlevel();
            //    $number = 1; $firstRow = true;
            
            //    for ($i = 0; $i < count($userlevel); $i++):
            //     $user_lvl = $userlevel[$i];
            ?>

            <!-- <tr>
                            <td><?= $number ?></td>
                            <td><?= $user_lvl['userlevel_name'] ?></td>
                            <td>Active</td>
                            <td>
                                <button type="button" class="btn btn-primary me-2 EditActivityBtn" id="" data-bs-type="" data-bs-id="" data-bs-toggle="modal" data-bs-target="#EditActivityModal" value="<?= $user_lvl['userlevel_id'] ?>" <?= $firstRow ? 'disabled' : '' ?>>Edit</button>
                                <button type="button" class="btn btn-danger me-2 DeleteActivityBtn" data-bs-id="" <?= $firstRow ? 'disabled' : '' ?>>delete</button>
                                <button type="button" class="btn btn-secondary" data-bs-id="" <?= $firstRow ? 'disabled' : '' ?>>Archive</button>
                                
                            </td>
                        </tr> -->
            <?php
            //   $number++; $firstRow = false;
            //   endfor;
            ?>

        </tbody>
    </table>
</div>


<!-- Modal -->
<?php include ('UserlevelCreate.php'); ?>
<?php include ('UserlevelUpdate.php'); ?>


<script>

    function togglePermissions(section, viewId, createId, editId, deleteId, archiveId, banId) {
        const viewCheckbox = document.getElementById(viewId);
        const createCheckbox = document.getElementById(createId);
        const editCheckbox = document.getElementById(editId);
        const deleteCheckbox = document.getElementById(deleteId);
        const archiveCheckbox = document.getElementById(archiveId);
        const banCheckbox = document.getElementById(banId);

        viewCheckbox.addEventListener("change", function () {
            // console.log(section, "Checkbox is checked:", this.checked);
            // createCheckbox.disabled = !this.checked;
            if (!this.checked) {
                createCheckbox.checked = false;
                editCheckbox.checked = false;
                deleteCheckbox.checked = false;
                archiveCheckbox.checked = false;

                createCheckbox.disabled = true;
                editCheckbox.disabled = true;
                deleteCheckbox.disabled = true;
                archiveCheckbox.disabled = true;
            } else {
                createCheckbox.disabled = false;
            }
            createCheckbox.addEventListener("change", function () {
                console.log(section, "Checkbox is checked:", this.checked);
                // editCheckbox.disabled = !this.checked;
                if (!this.checked) {
                    editCheckbox.checked = false;
                    deleteCheckbox.disabled = true;
                } else {
                    editCheckbox.disabled = false;
                }
            });

            editCheckbox.addEventListener("change", function () {
                console.log(section, "Checkbox is checked:", this.checked);
                // deleteCheckbox.disabled = !this.checked;
                if (!this.checked) {
                    deleteCheckbox.checked = false;
                    deleteCheckbox.disabled = true;
                } else {
                    deleteCheckbox.disabled = false;
                }
            });

            deleteCheckbox.addEventListener("change", function () {
                console.log(section, "Checkbox is checked:", this.checked);
                // archiveCheckbox.disabled = !this.checked;
                if (!this.checked) {
                    archiveCheckbox.checked = false;
                    archiveCheckbox.disabled = true;
                } else {
                    archiveCheckbox.disabled = false;
                }
            });
        });


        // 
    }


    // Dashboard Permissions
    togglePermissions("dashboard", "dashboard_view");

    // Content Management Permissions
    togglePermissions(
        "admin_management",
        "admin_management_view",
        "admin_management_create",
        "admin_management_update",
        "admin_management_delete",
        "admin_management_archive"
    );

    // File Management Permissions
    togglePermissions(
        "employee_management",
        "employee_management_view",
        "employee_management_create",
        "employee_management_update",
        "employee_management_delete",
        "employee_management_archive"
    );
    togglePermissions(
        "employee_monitoring",
        "employee_monitoring_view",
        "employee_monitoring_create",
        "employee_monitoring_update",
        "employee_monitoring_delete",
        "employee_monitoring_archive"
    );

    togglePermissions(
        "announcement",
        "announcement_view",
        "announcement_create",
        "announcement_update",
        "announcement_delete",
        "announcement_archive"
    );

    togglePermissions(
        "cms",
        "cms_view",
        "cms_create",
        "cms_update",
        "cms_delete",
        "cms_archive"
    );
</script>

<script>
    $(document).ready(function () {
        fetchUserlevel();

        $('#create_userlevel').click(function (event) {
            event.preventDefault();
            $('#ActivityTitle').text("Create new userlevel");

            $('.save_btn').attr('id', 'saveActivity');

        });

        $(document).on('click', '#saveActivity', function (event) {
            event.preventDefault();

            var formData = { 'permission': {} };
            var userlvl_name = $('#uname').val();

            // Loop through checked checkboxes and populate formData
            $('input[type="checkbox"]:checked').each(function () {
                var name = $(this).attr('name');
                var value = $(this).prop('checked') ? 1 : 0;
                var permission = name.split('[')[1].split(']')[0];
                var action = name.split('[')[2].split(']')[0];
                formData['permission'][permission] = formData['permission'][permission] || {};
                formData['permission'][permission][action] = value;
            });

            console.log("Form data to be sent:", formData);
            if (userlvl_name !== '') {

                // Call your AJAX post method here
                $.ajax({
                    type: 'POST',
                    url: '../Controller/UserlevelController.php',
                    data: {
                        formData: formData,
                        userlevelname: userlvl_name
                    },
                    dataType: 'json',
                    success: function (e) {

                        if (e.success === true) {
                            alert(e.message);
                            $('#table_userlevel').DataTable().destroy();
                            fetchUserlevel();
                            $('#ActivityModal').modal('hide');
                        } else {
                            alert(e.message);
                        }
                    },
                    error: function (er) {
                        console.log(er);
                    }
                });
            } else {
                return;
            }

        });

        $(document).on('click', '.RemoveAccountBtn', function (event) {
            let userlevel_id = $(this).data('bs-id');
            
            removeUserlvel(userlevel_id);
        });

    
    });

    function fetchUserlevel() {
        $.ajax({
            type: 'POST',
            url: '../Controller/UserlevelController.php',
            data: {
                fetch_all: 'userlevel'
            },
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                $('#table_userlevel').dataTable({
                    "data": data,
                    "responsive": true,
                    "columns": [
                        {
                            "data": null,
                            "render": function (data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            "data": "userlevel_name"
                        },
                        {
                            "data": "isArchive",
                            "render": function (data, type, row, meta) {

                                if (data == 1) {
                                    return '<span class="text-danger">Archived</span>';
                                } else {
                                    return '<span class="text-success">Active</span>';
                                }
                            }
                        },
                        {
                            "data": 'userlevel_id',
                            "orderable": false,
                            "render": function (data, type, row, meta) {
                                // Generate HTML for both buttons
                                var buttons = '';
                                if (meta.row === 0) {
                                    // If it's the first row, disable or hide the buttons
                                    buttons += 'No action allowed';
                                } else {
                                    buttons += '<button type="button" class="btn btn-outline-primary EditAccountBtn me-2" data-bs-id="' + data + '" data-bs-toggle="modal" data-bs-target="#ActivityModal">Edit</button>' +
                                        '<button type="button" class="btn btn-outline-danger RemoveAccountBtn me-2" data-bs-id="' + data + '">Remove</button>';
                                    // if (row.isArchive == 1) {
                                    //     buttons += '<button type="button" class="btn btn-outline-warning ArchiveAccountBtn" data-bs-id="' + data + '" data-bs-value="0">Unarchive</button>';
                                    // } else {
                                    //     buttons += '<button type="button" class="btn btn-outline-secondary ArchiveAccountBtn" data-bs-id="' + data + '" data-bs-value="1">Archive</button>';
                                    // }
                                }
                                return buttons;
                            }
                        }
                    ],
                });

                $(document).on('click', '.EditAccountBtn', function (event) {
                    event.preventDefault();

                    $('#ActivityTitle').text("Update userlevel");
                    $('.save_btn').attr('id', 'updateActivity');
                    let userlevel_id = $(this).data('bs-id');
                    updateUserlevel(userlevel_id, data);
                    
                });
            }
        });
    }

    function removeUserlvel(userlevel_id) {
        $.ajax({
            type: 'POST',
            url: '../Controller/UserlevelController.php',
            data: {
                remove: userlevel_id,
            },
            dataType: 'json',
            success: function (response) {
                if (response.success === true) {
                    alert(response.message);
                    $('#table_userlevel').DataTable().destroy();
                    fetchUserlevel();
                } else {
                    alert(response.message);
                }

            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function updateUserlevel(userlevel_id, data){
        const userlvl = data.find(item => item.userlevel_id === userlevel_id);
        if (userlvl){
            console.log(userlvl);
            $('#dashboard_view').prop('checked', userlvl.dashboard_permission_view === 1);

            $('#admin_management_view').prop('checked', userlvl.admin_management_view === 1);
            $('#admin_management_create').prop('checked', userlvl.announcement_create === 1);
            $('#admin_management_update').prop('checked', userlvl.announcement_update === 1);
            $('#admin_management_delete').prop('checked', userlvl.announcement_delete === 1);
            $('#admin_management_archive').prop('checked', userlvl.announcement_archive === 1);
            




        }
    }

</script>
<?php
require_once ('AdminFooter.php');
?>