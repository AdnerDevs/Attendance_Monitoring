<?php



require_once('AdminHeader.php');

?>
<style>
    .card-header {
        background-color: #f0e0ff;
    }
</style>
<div class="container-fluid min-vh-100">
    <div class="row mb-2" >
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

        <div class="col-md-4 mb-4 " style="min-height:70%;">
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

    <div class="row">
        <div class="col-md-12 table-responsive" style="max-height: 400px;">
            <table class="table table-striped" >
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i=0; $i<5; $i++):
                    ?>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    <?php
                        endfor;
                    ?>
                </tbody>
                <tfoot class="sticky-bottom">
                    <tr>
                        <td class="text-center" colspan="4">
                            View more details
                        </td>
                    </tr>
                    
                </tfoot>
            </table>
        </div>
        <div class="col-md-5">

        </div>
    </div>
</div>

<?php
require_once('AdminFooter.php');

?>