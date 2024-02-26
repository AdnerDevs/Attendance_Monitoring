<div class="modal fade" id="EditActivityModal" tabindex="-1" aria-labelledby="EditActivityModal" aria-hidden="true">
<form  method="POST" action="../Controller/UserlevelController.php"  enctype="multipart/form-data">
  <div class="modal-dialog modal-lg  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditUserlevelTitle">Add Userlevel</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="ssasd">
            <div class="container-fluid">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Permission Name</label>
                    <input type="text" class="form-control" name="username" id="ActivityTypeInput" placeholder="(e.g. Secretary)" required>
                </div>
                <div class="table-responsive" id="edit-table-userlevel">
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
                        <tbody id="userLevelsTable">
                            <tr>
                                <td>Dashboard</td>
                                <td scope="row"> <input class="form-check-input edit_dashboard_view" type="checkbox" name="permission[dashboard][view]" id="edit_dashboard_view" ></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Admin Management</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[admin_management][view]" id="edit_admin_management_view"></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[admin_management][create]" id="edit_admin_management_create" ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[admin_management][update]" id="edit_admin_management_update" ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[admin_management][delete]" id="edit_admin_management_delete" ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[admin_management][archive]" id="edit_admin_management_archive" ></td>
                            </tr>
                            <tr>
                                <td>Employee Management</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[employee_management][view]" id="edit_employee_management_view"></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_management][create]" id="edit_employee_management_create" ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_management][update]" id="edit_employee_management_update" ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_management][delete]" id="edit_employee_management_delete" ></td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>Employee Monitoring</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][view]" id="edit_employee_monitoring_view"></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][create]" id="edit_employee_monitoring_create" ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][update]" id="edit_employee_monitoring_update" ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][delete]" id="edit_employee_monitoring_delete" ></td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>Announcement</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[announcement][view]" id="edit_announcement_view"  ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[announcement][create]" id="edit_announcement_create" ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[announcement][update]" id="edit_announcement_update" ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[announcement][delete]" id="edit_announcement_delete" ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[announcement][archive]" id="edit_announcement_archive" ></td>
                            </tr>
                            <tr>
                                <td>CMS</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[cms][view]" id="edit_cms_view" ></td>
                                <td> </td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[cms][update]" id="edit_cms_update" ></td>
                                <td></td>
                                <td></td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
                
            </div>
        
       </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="EditUserlevel" name="edit_userlevel">Save changes</button>
      </div>
    </div>
  </div>
</form>
</div>


<script>
    $(document).ready(function(){
        let id;
        let dashboardPermission;
        // admin Management
        let adminView;
        let adminCreate;
        let adminUpdate;
        let adminDelete;
        let adminArchive;
        // employee Management
        let empManageView;
        let empManageCreate;
        let empManageUpdate;
        let empManageDelete;
        // let empManageView;
        // employee monitoring
        let empMonitorView;
        let empMonitorCreate;
        let empMonitorUpdate;
        let empMonitorDelete;
        // announcement 
        let announcementView;
        let announcementCreate;
        let announcementUpdate;
        let announcementDelete;
        let announcementArchive;
        // cms
        let cmsView;
        let cmsUpdate;

        $(".EditActivityBtn").click(function(){
            id = $(this).val();
            $("#EditActivityModal").find("#EditUserlevel").val(id);
            $.ajax({
                type: 'GET',
                url: '../Controller/UserlevelController.php',
                data:{
                    get_userlevel: id
                },
                success: function(response){
                    console.log(response);
                    
                   
                    // var tbody = $('#userLevelsTable');


                    // tbody.empty();

                    response.forEach(function(userlevel) {
                         dashboardPermission = userlevel.dashboard_permission_view === 1;
             
                        // admin Management
                        adminView = userlevel.admin_management_view === 1;
                        adminCreate = userlevel.admin_management_create === 1;
                        adminUpdate = userlevel.admin_management_update === 1;
                        adminDelete = userlevel.admin_management_delete === 1;
                        adminArchive = userlevel.admin_management_archive === 1;
                        // employee Management
                        empManageView = userlevel.employee_management_view === 1;
                        empManageCreate = userlevel.employee_management_create === 1;
                        empManageUpdate = userlevel.employee_management_update === 1;
                        empManageDelete = userlevel.employee_management_delete === 1;
                        // employee Management
                        empMonitorView = userlevel.employee_monitoring_management_view === 1;
                        empMonitorCreate = userlevel.employee_monitoring_management_create === 1;
                        empMonitorUpdate = userlevel.employee_monitoring_management_update === 1;
                        empMonitorDelete = userlevel.employee_monitoring_management_delete === 1;
                        // announcement Management
                        announcementView = userlevel.announcement_view === 1;
                        announcementCreate = userlevel.announcement_create === 1;
                        announcementUpdate = userlevel.announcement_update === 1;
                        announcementDelete = userlevel.announcement_delete === 1;
                        announcementArchive = userlevel.announcement_archive === 1;
                        // cms
                        cmsView = userlevel.cms_permission_view === 1;
                        cmsUpdate = userlevel.cms_permission_update === 1;
// console.log(cmsUpdate);
                        $("#edit_dashboard_view").prop('checked', dashboardPermission);
                        // admin
                        $("#edit_admin_management_view").prop('checked', adminView);
                        $("#edit_admin_management_create").prop('checked', adminCreate);
                        $("#edit_admin_management_update").prop('checked', adminUpdate);
                        $("#edit_admin_management_delete").prop('checked', adminDelete);
                        $("#edit_admin_management_archive").prop('checked', adminArchive);
                        // employee management
                        $("#edit_employee_management_view").prop('checked', empManageView);
                        $("#edit_employee_management_create").prop('checked', empManageCreate);
                        $("#edit_employee_management_update").prop('checked', empManageUpdate);
                        $("#edit_employee_management_delete").prop('checked', empManageDelete);
                        // employee monitoring
                        $("#edit_employee_monitoring_view").prop('checked', empMonitorView);
                        $("#edit_employee_monitoring_create").prop('checked', empMonitorCreate);
                        $("#edit_employee_monitoring_update").prop('checked', empManageUpdate);
                        $("#edit_employee_monitoring_delete").prop('checked', empMonitorDelete);
                        // announcement
                        $("#edit_announcement_view").prop('checked', announcementView);
                        $("#edit_announcement_create").prop('checked', announcementCreate);
                        $("#edit_announcement_update").prop('checked', announcementUpdate);
                        $("#edit_announcement_delete").prop('checked', announcementDelete);
                        $("#edit_announcement_archive").prop('checked', announcementArchive);
                        // cms
                        $("#edit_cms_view").prop('checked', cmsView);
                        $("#edit_cms_update").prop('checked', cmsUpdate);

                    });

                
                },
                error: function(error){
                    console.log(error);
                }
            });
        });
    });
    let dashboardPermission;

$(".edit_dashboard_view").change(function(){
    dashboardPermission = $(this).prop("checked");
});
    $("#EditUserlevel").click(function(){
        console.log("Dashboard View Checked: " + dashboardPermission);
        console.log("sdf: " + $(this).val());
    });

    function updateUserlevel(
        id,
        dashboardPermission,
        adminView,
        adminCreate,
        adminUpdate,
        adminDelete,
        adminArchive,
        empManageView,
        empManageCreate,
        empManageUpdate,
        empManageDelete,
        empMonitorView,
        empMonitorCreate,
        empMonitorUpdate,
        empMonitorDelete,
        announcementView,
        announcementCreate,
        announcementUpdate,
        announcementDelete,
        cmsView,
        cmsUpdate,
    ){
        if(id == 1){
            alert('cannot edit superadmin');
            return;
        }
        alert('editable');
        console.log(dashboardPermission);
    }
</script>