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
                                <td>Dashboard</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" value="" id="dashboard_view"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Admin Management</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" value="" id="admin_management_view"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="admin_management_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="admin_management_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="admin_management_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="admin_management_archive" disabled></td>
                            </tr>
                            <tr>
                                <td>Employee Management</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" value="" id="employee_management_view"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="employee_management_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="employee_management_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="employee_management_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="employee_management_archive" disabled></td>
                            </tr>
                            <tr>
                                <td>Employee Monitoring</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" value="" id="employee_monitoring_view"></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="employee_monitoring_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="employee_monitoring_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="employee_monitoring_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="employee_monitoring_archive"disabled></td>
                            </tr>
                            <tr>
                                <td>Announcement</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" value="" id="announcement_view"  ></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="announcement_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="announcement_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="announcement_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="announcement_archive" disabled></td>
                            </tr>
                            <tr>
                                <td>CMS</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" value="" id="cms_view" ></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="cms_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="cms_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="cms_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" value="" id="cms_archive" disabled></td>
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
function togglePermissions(section, viewId, createId, editId, deleteId, archiveId, banId) {
    const viewCheckbox = document.getElementById(viewId);
    const createCheckbox = document.getElementById(createId);
    const editCheckbox = document.getElementById(editId);
    const deleteCheckbox = document.getElementById(deleteId);
    const archiveCheckbox = document.getElementById(archiveId);
    const banCheckbox = document.getElementById(banId);

    viewCheckbox.addEventListener("change", function () {
        createCheckbox.disabled = !this.checked;
        if (!this.checked) {
            createCheckbox.checked = false;
            editCheckbox.checked = false;
            deleteCheckbox.checked = false;
            archiveCheckbox.checked = false;

            createCheckbox.disabled = true;
            editCheckbox.disabled = true;
            deleteCheckbox.disabled = true;
            archiveCheckbox.disabled = true;
        }
        createCheckbox.addEventListener("change", function () {
            editCheckbox.disabled = !this.checked;
            if (!this.checked) {
                editCheckbox.checked = false;
                deleteCheckbox.disabled = true;
            }
        });

        editCheckbox.addEventListener("change", function () {
            deleteCheckbox.disabled = !this.checked;
            if (!this.checked) {
                deleteCheckbox.checked = false;
            }
        });

        deleteCheckbox.addEventListener("change", function () {
            archiveCheckbox.disabled = !this.checked;
            if (!this.checked) {
                archiveCheckbox.checked = false;
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