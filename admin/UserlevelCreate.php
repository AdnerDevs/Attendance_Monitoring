<div class="modal fade" id="ActivityModal" tabindex="-1" aria-labelledby="ActivityModal" aria-hidden="true">
<form  method="POST" action="#" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="username" id="ActivityTypeInput" placeholder="(e.g. Secretary)" required>
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
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[dashboard][view]" id="dashboard_view" ></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Admin Management</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[admin_management][view]" id="admin_management_view"></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[admin_management][create]" id="admin_management_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[admin_management][update]" id="admin_management_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[admin_management][delete]" id="admin_management_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[admin_management][archive]" id="admin_management_archive" disabled></td>
                            </tr>
                            <tr>
                                <td>Employee Management</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[employee_management][view]" id="employee_management_view"></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_management][create]" id="employee_management_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_management][update]" id="employee_management_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_management][delete]" id="employee_management_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_management][archive]" id="employee_management_archive" disabled></td>
                            </tr>
                            <tr>
                                <td>Employee Monitoring</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][view]" id="employee_monitoring_view"></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][create]" id="employee_monitoring_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][update]" id="employee_monitoring_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][delete]" id="employee_monitoring_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[employee_monitoring][archive]" id="employee_monitoring_archive"disabled></td>
                            </tr>
                            <tr>
                                <td>Announcement</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[announcement][view]" id="announcement_view"  ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[announcement][create]" id="announcement_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[announcement][update]" id="announcement_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[announcement][delete]" id="announcement_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[announcement][archive]" id="announcement_archive" disabled></td>
                            </tr>
                            <tr>
                                <td>CMS</td>
                                <td scope="row"> <input class="form-check-input" type="checkbox" name="permission[cms][view]" id="cms_view" ></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[cms][view]" id="cms_create" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[cms][update]" id="cms_update" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[cms][delete]" id="cms_delete" disabled></td>
                                <td> <input class="form-check-input" type="checkbox" name="permission[cms][archive]" id="cms_archive" disabled></td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
                
            </div>
        
       </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="saveActivity" name="save_userlevel">Save changes</button>
      </div>
    </div>
  </div>
</form>
</div>

<script>
$(document).ready(function() {
    // Define an object to store the checkbox values
    var formData = {};

    // Bind the change event to all checkboxes
    $('input[type="checkbox"]').change(function() {
        // Get the name and checked status of the checkbox
        var name = $(this).attr('name');
        var checked = $(this).prop('checked');

        // Update the formData object with the checkbox value
        formData[name] = checked ? 1 : 0;

        // Log the updated formData object for debugging
        console.log(formData);
    });

    // Handle form submission
    // $('#saveActivity').click(function(event) {
    //     event.preventDefault(); // Prevent the form from submitting normally

    //     // Perform an AJAX request to submit the form data to the server
    //     $.ajax({
    //         type: 'POST', // Use POST method
    //         url: '../Controller/UserlevelController.php', // Specify the URL of the server-side script
    //         data: formData, // Pass the formData object as data
    //         dataType: 'json', // Expect JSON response from the server
    //         success: function(response) {
    //             // Handle the success response from the server
    //             console.log(response);
    //             // Optionally, perform any further actions based on the response
    //         },
    //         error: function(xhr, status, error) {
    //             // Handle the error response from the server
    //             console.error(xhr, status, error);
    //             // Optionally, display an error message to the user
    //         }
    //     });
    // });
});


</script>