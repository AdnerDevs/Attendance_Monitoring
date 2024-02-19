<?php
    require_once('header.php');
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

    @media (max-width: 576px) {
        .d{
            width: 100% !important;
            height: inherit !important;
            border-radius: 0 !important;
        }
    }
</style>
<div class="container-fluid min-vh-100 p-0 d-flex align-items-sm-center justify-content-sm-center">
            <div class="d row align-items-center justify-content-center bg-dark g-0 px-4 px-sm-0 p-4  shadow rounded  w-sm-100" style="width: 500px;">
            <!-- <div class="alert alert-primary" role="alert">
              
            </div> -->
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <a href="" class="d-flex justify-content-center mb-4">
                        <img src="asset/img/herogram.jpg" alt="" width="60" class="rounded-circle">
                        
                    </a>

                    <div class="text-center mb-5">
                        <p class="h3 fw-bold text-primary">Register</p>
                        <p class="text-secondary">Create your account</p>
                    </div>

                    <div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-id-badge" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_id" class="regInputField form-control form-control-lg fs-6 " placeholder="Employee ID">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_name" class="regInputField form-control form-control-lg fs-6 " placeholder="Employee Name">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="emp_surname" class="regInputField form-control form-control-lg fs-6 " placeholder="Employee Surname">
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
                        <a href="index.php"  style="text-decoration: none !important; color: inherit;">Login</a>
                    </button>
                </div>
            </div>
</div>



<script>
    $(document).ready(function(){
       
        let employee_id;
        let employee_name ;
        let employee_surname;
        let employee_complete_name ;

        $(".regInputField").on("input", function(){
            $(this).val($(this).val().toUpperCase());
        });
       

        $("#registerBtn").click(function(){
            employee_id = $("#emp_id").val();
            employee_name = $("#emp_name").val();
            employee_surname = $("#emp_surname").val();
            employee_complete_name = employee_name + " " +employee_surname;

            if (!employee_id || !employee_complete_name.trim()) {
                alert("Employee ID or name is empty");
                return;
            }
            registerEmployee(employee_id, employee_complete_name);
        });
    });

    function registerEmployee(employee_id, employee_complete_name){
        $.ajax({
            type: 'POST',
            url: 'Controller/EmployeeController.php',
            data: {
                emp_id: employee_id,
                emp_name: employee_complete_name,
            },
            success: function(response){
        
                if (response.status === 'error') {
                    if(response.errors.already_exist){
                        alert(response.errors.already_exist);
                    }
                   
                } else {
                    alert("Employee registered successfully");
                }

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