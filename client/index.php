<?php
    require_once ('header.php');
?>
<style>
    .bg-holder{
        position: absolute;
        width: 100%;
        min-height: 100%;
        top: 0;
        left: 0;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

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
</style>
<div class="container-fluid bg-dark">
    <div class="row min-vh-100 ">

        <div class="col-lg-6 position-relative d-none d-lg-block" >
           <div class="bg-holder" style="background-image: url('../asset/img/logo.jpg')">
                      
           </div>
        </div>

        <div class="col-lg-6 ">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <a href="" class="d-flex justify-content-center mb-4">
                        <img src="../asset/img/logo.jpg" alt="" width="60" class="rounded-circle">
                        
                    </a>

                    <div class="text-center mb-5">
                        <p class="h3 fw-bold text-primary">Log In</p>
                        <p class="text-secondary">Get access to your account</p>
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
                        Login
                    </button>

                    <div class="position-relative">
                        <hr class="text-secondary divider">
                        <div class="divider-content-center">or</div>
                    </div>
                    <button type="button" class="btn btn-outline-secondary btn-lg w-100" >
                        <a href="register.php"  style="text-decoration: none !important; color: inherit;">Register</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once ('footer.php');
?>
