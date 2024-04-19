<?php

require_once ('AdminHeader.php');
require_once ('../Model/EmployeeModel.php');

if (isset($_SESSION['employee_management_view']) && $_SESSION['employee_management_view'] == 1) {
  $users = new EmployeeModel();
  $employee = $users->getAllEmployees();

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

      <button class="btn btn-primary <?= $session_admin_management_create ?>" type="button" id="reg_employee">Register New
        Employee</button>
    </div>


    <script>
      $(document).ready(function () {
        $('#reg_employee').click(function () {
          window.location.href = '../register.php';
        });
      });
    </script>
    <table class="table" id="table_employee" class="">
      <thead>
        <tr>
          <th>No</th>
          <th>Employee id</th>
          <th>Department</th>
          <th>Job Position</th>
          <th>Name</th>
          <th>Account Created</th>
          <th>Status</th>
          <th class="<?= $session_employee_management_delete ?>">Action</th>
        </tr>
      </thead>
      <tbody>


      </tbody>
    </table>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="EditAccountModal" tabindex="-1" aria-labelledby="EditAccountModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="EditAccountModalTitle">Edit Employee Account</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body container-fluid" id="bodyEdit">
          <div class="d row align-items-center justify-content-center g-0 px-4 px-sm-0 p-4   w-sm-100"
            style=" width: 100%;">
            <div class="col col-sm-6 col-lg-7 col-xl-6">
              <div class="text-center mb-5">
                <p class="h3 fw-bold text-primary">Update</p>
                <p class="text-secondary">Update Employee Account</p>
              </div>
              <div class="row mb-4">
                <div class="col-12">
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      <i class="fa fa-id-badge" aria-hidden="true"></i>
                    </span>
                    <input type="text" name="" id="edit_admin_id" class="regInputField form-control form-control-lg fs-6 "
                      placeholder="Employee ID" value="">
                  </div>
                </div>

                <div class="col-12">
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                    <input type="text" name="" id="edit_admin_name"
                      class="regInputField form-control form-control-lg fs-6 " value="" placeholder=" Name">
                  </div>
                </div>
                <div class="col-12">
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                    <input type="text" name="" id="edit_admin_surname"
                      class="regInputField form-control form-control-lg fs-6 " value="" placeholder="Surname">
                  </div>
                </div>
                <div class="col-md-12 ">
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      <i class="fa fa-bullseye" aria-hidden="true"></i>
                    </span>
                    <select class="form-select dept" aria-label="Default select department">
                      <option value="0" selected disabled>Designated Department</option>

                    </select>
                  </div>
                </div>

                <div class="col-md-12 ">
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      <i class="fa fa-street-view" aria-hidden="true"></i>
                    </span>
                    <select class="form-select pos" aria-label="Default select position">
                      <option value="0" selected disabled>Job Position</option>
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
    var session_employee_management_delete = "<?php echo $session_employee_management_delete; ?>";
  </script>

  <script>
    $(document).ready(function () {
      let employee_id, dept, post, employee_name, employee_surname, employee_completename, department_id, position_id;

      if (!dept) {
        getAllDept();
      }
      if (!post) {
        getAllPosition();
      }
      fetchEmployee();
      getAllPosition();
      getAllDept();

      $(document).on('click', '#editAccountSaveBtn', function () {
        employee_id = $(this).val();
        updateEmployee(employee_id);
      });


      function fetchEmployee() {
        $.ajax({
          type: 'POST',
          url: '../Controller/EmployeeController.php',
          data: {
            fetch_employee: 'fetch'
          },
          dataType: 'json',
          success: function (data) {

            $("#table_employee").DataTable({
              "data": data,
              "responsive": true,
              "columns": [{
                "data": null,
                "orderable": false,
                "render": function (data, type, row, meta) {
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
                "data": "position_name"
              },
              {
                "data": "employee_name"
              },
              {
                "data": "created_time"
              },
              {
                "data": "status",
                "render": function (data, type, row, meta) {
                  if (data == 0) {
                    return '<span class="text-secondary">Offline</span>';
                  } else {
                    return '<span class="text-primary">Online</span>';
                  }
                }
              },
              {
                "data": "employee_id",
                "orderable": false,
                "render": function (data, type, row, meta) {
                  var buttons = '';
                  if (session_employee_management_delete.trim() === '') {
                    buttons += '<button type="button" class="btn btn-outline-primary EditAccountBtn me-2 ' + session_employee_management_delete + '" data-bs-id="' + data + '" data-bs-toggle="modal" data-bs-target="#EditAccountModal" data-tooltip="tooltip" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>' +
                      '<button type="button" class="btn btn-outline-danger RemoveAccountBtn me-2 ' + session_employee_management_delete + '" data-bs-id="' + data + '" data-tooltip="tooltip" title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                  }
                  return buttons;
                }
              }
              ],
            });

            $("#table_employee").on("click", ".EditAccountBtn", function () {
              employee_id = $(this).data("bs-id");
              getEmployee(employee_id, data);

            });


          },
          erorr: function (error) {
            console.log(error);
          }
        });
      }

      $(document).on('click', '.RemoveAccountBtn', function (e) {
        employee_id = $(this).data("bs-id");

        let confirmRevove = confirm('Are you sure you want to remove this employee? By removing employee they no longer have rights to login to the website');
        if (confirmRevove) {

          $.ajax({
            type: 'POST',
            url: '../Controller/EmployeeController.php',
            data: {
              remove_employee: employee_id
            },
            dataType: 'json',
            success: function (response) {
              // console.log(response);
              if (response.status === "success") {
                $("#table_employee").DataTable().destroy();
                alert("Employee has been removed");
                fetchEmployee();
              } else {
                alert("error in removing");
              }
            },
            error: function (error) {
              console.log(error);
            }
          });
        } else {
          return;
        }
      });


      function updateEmployee(employee_id) {

        let employee_id_new = $('#EditAccountModal').find("#edit_admin_id").val();

        employee_name = $('#EditAccountModal').find("#edit_admin_name").val();
        employee_surname = $('#EditAccountModal').find("#edit_admin_surname").val();
        employee_completename = `${employee_name} ${employee_surname}`;
        let deptd = $(".dept").val();
        $(".dept").change(function () {
          deptd = $(this).val()
        });

        let pos_id = $(".pos").val();
        $(".pos").change(function () {
          pos_id = $(this).val()
        });

        $.ajax({
          type: 'POST',
          url: '../Controller/EmployeeController.php',
          data: {
            edit_emp_id_old: employee_id,
            edit_emp_id_new: employee_id_new,
            edit_name: employee_completename,
            edit_dept_id: deptd,
            edit_pos_id: pos_id,
          },
          dataType: 'json',
          success: function (result) {
            if (result.status === 'success') {

              $("#table_employee").DataTable().destroy();
              alert("Updated successfully");
              fetchEmployee();
            } else if (response.status === 'failed') {
              alert("Failed to update");
            }
          },
          error: function (error) {
            console.log(error);
          }


        });

      }
    });


    function getEmployee(employee_id, result) {

      const employee_data = result.find(item => item.employee_id === employee_id);

      if (employee_data) {

        // Split admin name into first name and surname
        let nameArray = employee_data.employee_name.split(' ');
        let name = nameArray[0];
        let surname = nameArray.slice(1).join(' ');

        // Set values for username, name, and surname fields in the modal
        $('#EditAccountModal').find("#edit_admin_id").val(employee_data.employee_id);
        $('#EditAccountModal').find("#edit_admin_name").val(name);
        $('#EditAccountModal').find("#edit_admin_surname").val(surname);
        $('#EditAccountModal').find("#editAccountSaveBtn").val(employee_id);

        let dept_select = $(".dept");
        let pos_select = $(".pos");
        dept_select.empty(); // Clear existing options before populating again
        pos_select.empty();
        // Add options using the existing userLevels data
        $.each(dept, function (index, depts) {
          // Append option to the select element
          let option = $('<option>', {
            value: depts.department_id,
            text: depts.department_name
          });

          // Set selected attribute if the userlevel_id matches admin's userlevel_id
          if (depts.department_id === employee_data.department_id) {
            option.attr('selected', 'selected');
          }

          dept_select.append(option);
        });

        $.each(post, function (index, posts) {
          // Append option to the select element
          let option = $('<option>', {
            value: posts.id,
            text: posts.position_name
          });

          // Set selected attribute if the userlevel_id matches admin's userlevel_id
          if (posts.id === employee_data.position_id) {
            option.attr('selected', 'selected');
          }

          pos_select.append(option);
        });


      } else {
        console.log('Employee not found.');
      }
    }




    function getAllDept() {
      $.ajax({
        type: 'POST',
        url: "../Controller/DepartmentController.php",
        data: {
          fetch_department: 'fetch',
        },
        dataType: 'json',
        success: function (data) {
          dept = data;


        },
        error: function (error) {
          console.log(error);
        }
      });
    }

    function getAllPosition() {
      $.ajax({
        type: 'POST',
        url: "../Controller/EmployeePositionController.php",
        data: {
          get_all_display: 'fetch',
        },
        dataType: 'json',
        success: function (data) {
          post = data;
        },
        error: function (error) {
          console.log(error);
        }
      });
    }

  </script>
  <?php
  require_once ('AdminFooter.php');
}
?>