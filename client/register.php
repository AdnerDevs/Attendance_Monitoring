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
            <div class="d row align-items-center justify-content-center bg-dark g-0 px-4 px-sm-0 p-4  shadow rounded  w-sm-100" style="width: 500px; height: 700px; ">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <a href="" class="d-flex justify-content-center mb-4">
                        <img src="../asset/img/logo.jpg" alt="" width="60" class="rounded-circle">
                        
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
                            <input type="text" name="" id="" class="form-control form-control-lg fs-6" placeholder="Employee ID">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="" id="" class="form-control form-control-lg fs-6" placeholder="Employee Name">
                        </div>
                    </div>

                    <button type="button" class="btn btn-outline-primary btn-lg w-100" >
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


<?php
    require_once('footer.php');
?>