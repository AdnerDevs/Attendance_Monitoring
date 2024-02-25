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
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[dashboard][view]" id="edit_dashboard_view" ></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Admin Management</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[admin_management][view]" id="edit_admin_management_view"></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[admin_management][create]" id="edit_admin_management_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[admin_management][update]" id="edit_admin_management_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[admin_management][delete]" id="edit_admin_management_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[admin_management][archive]" id="edit_admin_management_archive" disabled></td>
                            </tr>
                            <tr>
                                <td>Employee Management</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[employee_management][view]" id="edit_employee_management_view"></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_management][create]" id="edit_employee_management_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_management][update]" id="edit_employee_management_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_management][delete]" id="edit_employee_management_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_management][archive]" id="edit_employee_management_archive" disabled></td>
                            </tr>
                            <tr>
                                <td>Employee Monitoring</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][view]" id="edit_employee_monitoring_view"></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][create]" id="edit_employee_monitoring_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][update]" id="edit_employee_monitoring_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][delete]" id="edit_employee_monitoring_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][archive]" id="edit_employee_monitoring_archive"disabled></td>
                            </tr>
                            <tr>
                                <td>Announcement</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[announcement][view]" id="edit_announcement_view"  ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[announcement][create]" id="edit_announcement_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[announcement][update]" id="edit_announcement_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[announcement][delete]" id="edit_announcement_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[announcement][archive]" id="edit_announcement_archive" disabled></td>
                            </tr>
                            <tr>
                                <td>CMS</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[cms][view]" id="edit_cms_view" ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[cms][view]" id="edit_cms_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[cms][update]" id="edit_cms_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[cms][delete]" id="edit_cms_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[cms][archive]" id="edit_cms_archive" disabled></td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
                
            </div>
        
       </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveUserlevel" name="edit_userlevel">Save changes</button>
      </div>
    </div>
  </div>
</form>
</div>


<script>
    $(document).ready(function(){

        $(".EditActivityBtn").click(function(){
            let id = $(this).val();
  
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
                        var dashboardPermission = userlevel.employee_monitoring_management_view === 1;
                        $("#edit_employee_monitoring_view").prop('checked', dashboardPermission);
                        // tbody.append(`
                        //             <tr>
                        //                 <td>Dashboard</td>
                        //                 <td scope="row"> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[dashboard][view]" 
                        //                       id="edit_edit_dashboard_view${userlevel.dashboard_permission_view === 1 ? '" checked>' : '">'}
                        //                 </td>
                        //                 <td></td>
                        //                 <td></td>
                        //                 <td></td>
                        //                 <td></td>
                        //             </tr>
                        //             <tr>
                        //                 <td>Admin Management</td>
                        //                 <td scope="row"> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[admin_management][view]" 
                        //                       id="edit_admin_management_view${userlevel.admin_management_view === 1 ? '" checked>' : '">'}
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[admin_management][create]" 
                        //                       id="edit_admin_management_create" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[admin_management][update]" 
                        //                       id="edit_admin_management_update" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[admin_management][delete]" 
                        //                       id="edit_admin_management_delete" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[admin_management][archive]" 
                        //                       id="edit_admin_management_archive" disabled>
                        //                 </td>
                        //             </tr>
                        //             <tr>
                        //                 <td>Employee Management</td>
                        //                 <td scope="row"> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[employee_management][view]" 
                        //                       id="edit_employee_management_view${userlevel.employee_management_view === 1 ? '" checked>' : '">'}
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[employee_management][create]" 
                        //                       id="edit_employee_management_create" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[employee_management][update]" 
                        //                       id="edit_employee_management_update" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[employee_management][delete]" 
                        //                       id="edit_employee_management_delete" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[employee_management][archive]" 
                        //                       id="edit_employee_management_archive" disabled>
                        //                 </td>
                        //             </tr>
                        //             <tr>
                        //                 <td>Employee Monitoring</td>
                        //                 <td scope="row"> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][view]" 
                        //                       id="edit_employee_monitoring_view${userlevel.employee_monitoring_view === 1 ? '" checked>' : '">'}
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][create]" 
                        //                       id="edit_employee_monitoring_create" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][update]" 
                        //                       id="edit_employee_monitoring_update" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][delete]" 
                        //                       id="edit_employee_monitoring_delete" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][archive]" 
                        //                       id="edit_employee_monitoring_archive"disabled>
                        //                 </td>
                        //             </tr>
                        //             <tr>
                        //                 <td>Announcement</td>
                        //                 <td scope="row"> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[announcement][view]" 
                        //                       id="edit_announcement_view${userlevel.announcement_view === 1 ? '" checked>' : '">'}
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[announcement][create]" 
                        //                       id="edit_announcement_create" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[announcement][update]" 
                        //                       id="edit_announcement_update" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[announcement][delete]" 
                        //                       id="edit_announcement_delete" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[announcement][archive]" 
                        //                       id="edit_announcement_archive" disabled>
                        //                 </td>
                        //             </tr>
                        //             <tr>
                        //                 <td>CMS</td>
                        //                 <td scope="row"> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[cms][view]" 
                        //                       id="edit_cms_view${userlevel.cms_permission_view === 1 ? '" checked>' : '">'}
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[cms][view]" 
                        //                       id="edit_cms_create" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[cms][update]" 
                        //                       id="edit_cms_update" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[cms][delete]" 
                        //                       id="edit_cms_delete" disabled>
                        //                 </td>
                        //                 <td> 
                        //                     <input class="form-check-input" type="checkbox" name="permission[cms][archive]" 
                        //                       id="edit_cms_archive" disabled>
                        //                 </td>
                        //             </tr>
                        //         `);

                    });
               
                },
                error: function(error){
                    console.log(error);
                }
            });
        });
    });
</script>