<?php

    require_once ('AdminHeader.php');
    require_once ('../Model/UserlevelModel.php');

    $userlevel_model = new UserlevelModel();

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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           $userlevel = $userlevel_model->getAllUserlevel();
                           $number = 1; $firstRow = true;
                           
                           for ($i = 0; $i < count($userlevel); $i++):
                            $user_lvl = $userlevel[$i];
                        ?>

                        <tr>
                            <td><?= $number?></td>
                            <td><?=$user_lvl['userlevel_name']?></td>
                            <td>Active</td>
                            <td>
                                <button type="button" class="btn btn-primary me-2 EditActivityBtn" id="" data-bs-type="" data-bs-id="" data-bs-toggle="modal" data-bs-target="#EditActivityModal" value="<?=$user_lvl['userlevel_id']?>" <?= $firstRow ? 'disabled' : '' ?>>Edit</button>
                                <button type="button" class="btn btn-danger me-2 DeleteActivityBtn" data-bs-id="" <?= $firstRow ? 'disabled' : '' ?>>delete</button>
                                <button type="button" class="btn btn-secondary" data-bs-id="" <?= $firstRow ? 'disabled' : '' ?>>Archive</button>
                                
                            </td>
                        </tr>
                        <?php
                          $number++; $firstRow = false;
                          endfor;
                        ?>
                   
                    </tbody>
                </table>
            </div>


<!-- Modal -->
<?php include('UserlevelCreate.php');?>
<?php include('UserlevelUpdate.php');?>


<script>

function togglePermissions(section, viewId, createId, editId, deleteId, archiveId, banId) {
    const viewCheckbox = document.getElementById(viewId);
    const createCheckbox = document.getElementById(createId);
    const editCheckbox = document.getElementById(editId);
    const deleteCheckbox = document.getElementById(deleteId);
    const archiveCheckbox = document.getElementById(archiveId);
    const banCheckbox = document.getElementById(banId);

    viewCheckbox.addEventListener("change", function () {
        console.log(section, "Checkbox is checked:", this.checked);
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
        }else{   
            createCheckbox.disabled = false;
        }
        createCheckbox.addEventListener("change", function () {
            console.log(section, "Checkbox is checked:", this.checked);
            // editCheckbox.disabled = !this.checked;
            if (!this.checked) {
                editCheckbox.checked = false;
                deleteCheckbox.disabled = true;
            }else{
                editCheckbox.disabled = false;
            }
        });

        editCheckbox.addEventListener("change", function () {
            console.log(section, "Checkbox is checked:", this.checked);
            // deleteCheckbox.disabled = !this.checked;
            if (!this.checked) {
                deleteCheckbox.checked = false;
                deleteCheckbox.disabled = true;
            }else{
                deleteCheckbox.disabled = false;
            }
        });

        deleteCheckbox.addEventListener("change", function () {
            console.log(section, "Checkbox is checked:", this.checked);
            // archiveCheckbox.disabled = !this.checked;
            if (!this.checked) {
                archiveCheckbox.checked = false;
                archiveCheckbox.disabled = true;
            }else{
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
<?php
    require_once ('AdminFooter.php');
?>