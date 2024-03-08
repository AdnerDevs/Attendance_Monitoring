<?php
    require_once('header.php');
    require_once('Model/DepartmentModel.php');

    $department_model = new DepartmentModel();
?>
<style>
    .divider-content-center{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        background-color: #212529;
        font-size: 0.8rem;
        font-weight: 500;
        color: #999;
    }

    @media (max-width: 928px) {
        .credential{
            flex: 0 0 auto !important;
            width: 100% !important;
        }
    }


</style>
<div class="container-fluid min-vh-100 p-0 d-flex justify-content-sm-center">
            <div class="d row align-items-center justify-content-center bg-dark g-0 px-4 px-sm-0 p-4  shadow  w-sm-100" style="min-height: 600px; width: 100%;">
            <!-- <div class="alert alert-primary" role="alert">
              
            </div> -->
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <a href="/attendance_monitoring" class="d-flex justify-content-center mb-4">
                        <img src="asset/img/herogram.jpg" alt="" width="60" class="rounded-circle">
                        
                    </a>

                    <div class="text-center mb-5">
                        <p class="h3 fw-bold text-primary">Register</p>
                        <p class="text-secondary">Create your account</p>
                    </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-id-badge" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_id" class="regInputField form-control form-control-lg fs-6 " placeholder="Employee ID">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-id-badge" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_nName" class="regInputField form-control form-control-lg fs-6 " placeholder="Nickname">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_name" class="regInputField form-control form-control-lg fs-6 " placeholder="Name">
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_surname" class="regInputField form-control form-control-lg fs-6 " placeholder="Surname">
                        </div>
                    </div>

                    <div class="col-md-12 ">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-bullseye" aria-hidden="true"></i>
                            </span>
                            <select class="form-select" aria-label="Default select department">
                                <option value="0" selected disabled>Designated Department</option>
                                <?php
                                    $department = $department_model->getAllDepartment();

                                    foreach ($department as $dept):
                                ?>
                                <option value="<?=$dept['department_id']?>"><?=$dept['department_name']?></option>
                                <?php
                                    endforeach;
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <p class=" text-secondary text-center mt-2 mb-4">Your Login Credentials:</p>
                    </div>

                    <div class="credential col-md-6">
                        <label for="emp_generate_id" class="form-label text-white">Employee ID credential:</label>
                        <div class="input-group mb-3">
                            
                            <span class="input-group-text">
                                <i class="fa fa-shield" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_generate_id" class="regInputField form-control form-control-lg fs-6 " placeholder="Login Credentials" disabled>
                        </div>
                    </div>

                    <div class="credential col-md-6">
                        <label for="emp_generate_name" class="form-label text-white">Employee username credential:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                    <i class="fa fa-shield" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_generate_name" class="regInputField form-control form-control-lg fs-6 " placeholder="Login Credentials" disabled>
                        </div>
                    </div>
                </div>



                    <button type="button" class="btn btn-outline-primary btn-lg w-100" id="registerBtn">
                        Register
                    </button>

                    <div class="position-relative">
                        <hr class="text-secondary divider">
                        <div class="divider-content-center">or</div>
                    </div>
                    <button type="button" class="btn btn-outline-secondary btn-lg w-100" >
                        <a href="/Attendance_Monitoring/"  style="text-decoration: none !important; color: inherit;">Login</a>
                    </button>
                </div>
            </div>
</div>



<script>
    $(document).ready(function(){
       
        let employee_id;
        let nickname;
        let employee_name ;
        let employee_surname;
        let employee_complete_name ;
        let id_credential;
        let surname_credential
        let department_id = 0;
        $("#emp_id, #emp_nName").on("keyup", function(){
            employee_id = $("#emp_id").val();
            nickname = $("#emp_nName").val();
            id_credential = `${employee_id}${nickname}`;
            $("#emp_generate_id").val(id_credential);
        });

      
        $("#emp_surname").on("keyup", function(){
            surname_credential = $(this).val();
        
            $("#emp_generate_name").val(surname_credential);
        });

        $(".regInputField").on("input", function(){
            $(this).val($(this).val().toUpperCase());
        });
           

        $(".form-select").change(function(){
            department_id = $(this).val();
         });

        $("#registerBtn").click(function(){
            employee_id = $("#emp_id").val();
            nickname = $("#emp_nName").val();
            employee_name = $("#emp_name").val();
            employee_surname = $("#emp_surname").val();
            employee_complete_name = `${employee_name} ${employee_surname}`;

            if (!employee_id || !employee_complete_name.trim() || !nickname ) {
                alert("Please fill in all required fields");
                return;
            }
            if(department_id == 0 || department_id == undefined){
                alert("Please select a department");
                return;
            }

            registerEmployee(employee_id, employee_complete_name, nickname, department_id, id_credential, surname_credential)

        });
    });

    function registerEmployee(employee_id, employee_complete_name, nickname, department_id, id_credential, surname_credential){
       
        $.ajax({
            type: 'POST',
            url: 'Controller/EmployeeController.php',
            data: {
                emp_id: employee_id,
                emp_name: employee_complete_name,
                n_name: nickname,
                dept_id: department_id,
                id_cred:id_credential,
                s_name_cred: surname_credential
            },
            success: function(response){
        
                if (response.status === 'error') {
                    if(response.errors.format_id){
                        alert(response.errors.format_id);
                    }
                
                   
                } else if (response.status === 'success'){
                    alert("Employee registered successfully");
                    window.location.href='/Attendance_monitoring';
                }else if (response.status === 'validate'){
                    alert("ID Already exist");
           
                }else{
                    alert("Failed to register");
                }

                console.log(response);

            },
            error: function(error){
                console.log(error);
            }

        });
    }
</script>
<?php
    require_once('footer.php');
?>