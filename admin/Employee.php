<?php

require_once('AdminHeader.php');
require_once('../Model/EmployeeModel.php');

$users = new EmployeeModel();
$employee = $users->getAllEmployees();
if (isset($_SESSION['employee_management_view']) && $_SESSION['employee_management_view'] == 1) {
?>
  <?php
  isset($_SESSION['employee_management_create']) && $_SESSION["employee_management_create"] == 1 ? $addState = " " : $addState = "d-none";
  isset($_SESSION['employee_management_update']) && $_SESSION["employee_management_update"] == 1 ? $editState = " " : $editState = "d-none";
  isset($_SESSION['employee_management_delete']) && $_SESSION["employee_management_delete"] == 1 ? $state = " " : $state = "d-none";


  $isAllowed = (
    isset($_SESSION['employee_management_create']) && $_SESSION['employee_management_create'] == 1 &&
    isset($_SESSION['employee_management_update']) && $_SESSION['employee_management_update'] == 1 &&
    isset($_SESSION['employee_management_delete']) && $_SESSION['employee_management_delete'] == 1
  ) ? $hide_action = ' ' : $hide_action = 'd-none';

  ?>
  <div class="table-responsive">
    <div class="d-flex flex-row p-2 align-items-center">
      <p class="h4 mb-0 me-2">Employees</p>
    </div>



    <table class="table" id="table_employee" class="">
      <thead>
        <tr>
          <th>No</th>
          <th>Employee id</th>
          <th>Department</th>
          <th>Name</th>
          <th>Account Created</th>
          <th>Status</th>
          <th class="<?= $hide_action ?>">Action</th>
        </tr>
      </thead>
      <tbody>
        

      </tbody>
    </table>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="ActivityModal" tabindex="-1" aria-labelledby="ActivityModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ActivityTitle">Add Activity Type</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Activity Type</label>
            <input type="text" class="form-control" id="ActivityTypeInput" placeholder="Activity type">
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
    $(document).ready(function() {
      let employee_id;
      fetchEmployee();
      

      function fetchEmployee() {
        $.ajax({
          type: 'POST',
          url: '../Controller/EmployeeController.php',
          data: {
            fetch_employee: 'fetch'
          },
          dataType: 'json',
          success: function(data) {
            console.log(data);
            $("#table_employee").DataTable({
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
                  "data": "employee_id"
                },
                {
                  "data": "department_name"
                },
                {
                  "data": "employee_name"
                },
                {
                  "data": "created_time"
                },
                {
                  "data": "status",
                  "render": function(data, type, row, meta) {
                    if (data == 0) {
                      return '<span class="text-secondary">Offline</span>';
                    } else {
                      return '<span class="text-primary">Online</span>';
                    }
                  }
                },
                {
                  "data": "employee_id",
                  "orderable":false,
                  "render": function(data, type, row, meta) {
                    var buttons = '';
                    buttons +='<button type="button" class="btn btn-outline-danger RemoveAccountBtn me-2" data-bs-id="' + data + '">Remove</button>';

                    return buttons;
                  }
                }
              ],
            });
          },
          erorr: function(error) {
            console.log(error);
          }
        });
      }

      $(document).on('click', '.RemoveAccountBtn', function(e){
        employee_id = $(this).data("bs-id");
        alert(employee_id);
      });
    });
  </script>
<?php
  require_once('AdminFooter.php');
}
?>