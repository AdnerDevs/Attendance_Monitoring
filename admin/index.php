<?php



    require_once ('AdminHeader.php');
   
?>
<style>
      .card-header{
    background-color: #f0e0ff;
  }
</style>
<div class="container-fluid min-vh-100">
    <div class="row">
        <div class="col-md-4 mb-4" style="max-height:500px;">
            <div class="card shadow" style="">
                <div class="card-header  py-3 text-center ">
                <h5 class="card-header ">TOTAL EMPLOYEE</h5>
                <span><?php echo date('F j, Y'); ?></span>
                    <div class="card-body">
                    <h1 class="card-title "></h1>
                    <div class="more-info">
                    <a href="Employee.php" id="#">More Info</a>
                </div>
                </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4" style="max-height:500px;">
            <div class="card shadow" style="">
                <div class="card-header  py-3 text-center ">
                <h5 class="card-header ">TOTAL ADMIN</h5>
                <span><?php echo date('F j, Y'); ?></span>
                    <div class="card-body">
                    <h1 class="card-title "></h1>
                    <div class="more-info">
                    <a href="AdminAccount.php" id="#">More Info</a>
                </div>
                </div>
                </div>
            </div>
        </div>
            
        <div class="col-md-4 mb-4 " style="max-height:500px;">
            <div class="card shadow" style="">
                <div class="card-header  py-3 text-center ">
                <h5 class="card-header ">ACTIVE EMPLOYEE</h5>
                <span><?php echo date('F j, Y'); ?></span>
                    <div class="card-body">
                    <h1 class="card-title "></h1>
                    <div class="more-info">
                    <a href="Employee.php" id="#">More Info</a>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once ('AdminFooter.php');
  
?>
