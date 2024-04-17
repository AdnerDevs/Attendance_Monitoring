<?php

require_once ('AdminHeader.php');
require_once ('../Model/DepartmentModel.php');

$department_model = new DepartmentModel();
?>

<div class="table-responsive">
    <div class="d-flex flex-row p-2 align-items-center">
        <p class="h4 mb-0 me-2">Job Position</p>

        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#PosModal"
            id="add_pos">Add</button>
    </div>

    <table class="table" id="table_job_position">
        <thead>
            <tr>
                <th>No.</th>
                <th>Job Position</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="PosModal" tabindex="-1" aria-labelledby="PosModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_title"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Job Position:</label>
                    <input type="text" class="form-control" id="PositionInput" placeholder="(e.g. IT Head)">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save_btn">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DeleteDepartmentModal" tabindex="-1" aria-labelledby="DeleteDepartmentModal"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="DeleteDepartmentTitle">Delete Department</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                Are you sure you want to delete <span id="dp_name"></span> ?
                <input type="hidden" id="DeleteDepartmentID">
                <input type="hidden" id="DeleteDepartmentValue">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="delDepartment" data-bs-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        fetchEmployeePosition();

        let jobPos;
        let id;
        $('#add_pos').click(function () {
            popPosition();
        });

        $(document).on('click', '#updateActivity', function () {
            id = $(this).val();
            jobPos = $('#PositionInput').val();

            executeUpdate(id, jobPos);
        });


        $("#table_job_position").on("click", ".ArchiveAccountBtn", function () {
            id = $(this).data('bs-id');
            const val = $(this).data('bs-value');
            archive(id, val);
        });


        $("#table_job_position").on("click", ".RemoveAccountBtn", function () {
            id = $(this).data('bs-id');
            var confirmRemove = confirm('Are you sure you want to remove this announcement?');
            if (confirmRemove) {
                remove(id);
            } else {
                return;
            }

        });

    });

    function fetchEmployeePosition() {
        $.ajax({
            type: 'POST',
            url: '../Controller/EmployeePositionController.php',
            data: {
                get_all: 'load_position'
            },
            dataType: 'json',
            success: function (data) {

                $("#table_job_position").DataTable({
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
                        "data": "position_name"
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
                        "data": "id",
                        "orderable": false,
                        "render": function (data, type, row, meta) {
                            var buttons = '';

                            // if (session_admin_management_update.trim() === '') {


                            // if (meta.row === 0) {
                            //     // If it's the first row, disable or hide the buttons
                            //     buttons += 'No action allowed';
                            // } else {
                            // If it's not the first row, render the buttons normally
                            buttons += '<button type="button" class="btn btn-outline-primary EditAccountBtn me-2 " data-bs-id="' + data + '" data-bs-toggle="modal" data-bs-target="#PosModal" data-tooltip="tooltip" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>' +
                                '<button type="button" class="btn btn-outline-danger RemoveAccountBtn me-2 " data-bs-id="' + data + '" data-tooltip="tooltip" title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                            if (row.isArchive == 1) {
                                buttons += '<button type="button" class="btn btn-outline-warning ArchiveAccountBtn " data-bs-id="' + data + '" data-bs-value="0" data-tooltip="tooltip" title="Restricted"><i class="fa fa-ban" aria-hidden="true"></i></button>';
                            } else {
                                buttons += '<button type="button" class="btn btn-outline-success ArchiveAccountBtn " data-bs-id="' + data + '" data-bs-value="1" data-tooltip="tooltip" title="Allowed"><i class="fa fa-check-circle" aria-hidden="true"></i></button>';
                            }
                            // }
                            // }
                            return buttons;

                        }
                    }
                    ],
                });



                $("#table_job_position").on("click", ".EditAccountBtn", function () {
                    id = $(this).data("bs-id");
                    $('#modal_title').text('Update Job Position');
                    getUpdate(id, data);
                    // getAdminById(id, data);
                    $('.save_btn').attr('id', 'updateActivity');
                });



            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function popPosition() {
        $('#modal_title').text('Add New Job Position');
        $('.save_btn').attr('id', 'saveActivity');

        $(document).on('click', '#saveActivity', function (event) {
            jobPos = $('#PositionInput').val();
            if (jobPos != '') {
                addPosition(jobPos)
            } else {
                alert('Please fill in required field');
                return;
            }

        });
    }

    function addPosition(jobPos) {
        $.ajax({
            type: 'POST',
            url: '../Controller/EmployeePositionController.php',
            data: {
                name: jobPos
            },
            dataType: 'json',
            success: function (result) {
                if (result.status === 'success') {
                    alert('Successfully created');
                    $('#table_job_position').DataTable().destroy();
                    fetchEmployeePosition();
                    $('#PosModal').modal('hide');
                } else {
                    alert('error');
                }

            },
            error: function (error) {

            }
        });
    }


    function getUpdate(id, result) {
        const position = result.find(item => item.id === id);

        if (position) {

            $('#PositionInput').val(position.position_name);
            $('.save_btn').val(position.id);


        } else {
            console.log('Admin not found.');
        }
    }

    function executeUpdate(id, jobPos) {
        // console.log(id, jobPos);
        $.ajax({
            type: 'POST',
            url: '../Controller/EmployeePositionController.php',
            data: {
                edit_name: jobPos,
                id: id,
            },
            success: function (response) {
                if (response.status === 'success') {
                    alert("Updated successfully");
                    $("#table_job_position").DataTable().destroy();
                    fetchEmployeePosition();
                    $('#PosModal').modal('hide');
                } else if (response.status === 'failed') {
                    alert("Failed to update");
                }

            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function archive(id, val) {
        $.ajax({
            type: 'POST',
            url: '../Controller/EmployeePositionController.php',
            data: {
                is_archive: val,
                id: id,
            },
            success: function (response) {
                if (response) {
                    alert("Updated successfully");
                    $("#table_job_position").DataTable().destroy();
                    fetchEmployeePosition();
                    $('#PosModal').modal('hide');
                } else if (response.status === 'failed') {
                    alert("Failed to update");
                }

            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function remove(id){
        $.ajax({
            type: 'POST',
            url: '../Controller/EmployeePositionController.php',
            data: {
                is_remove: id,

            },
            success: function (response) {
                if (response) {
                    alert("data has been removed");
                    $("#table_job_position").DataTable().destroy();
                    fetchEmployeePosition();
                    $('#PosModal').modal('hide');
                } else if (response.status === 'failed') {
                    alert("Failed to update");
                }

            },
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>
<?php
require_once ('AdminFooter.php');
?>