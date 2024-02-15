<?php
    require_once ('client/header.php');
?>
<div class="container-fluid d-flex">
    <aside id="sidebar" class="bg-dark">
        <div class="d-flex">
            <button id="toggle-btn" type="button">
                <i class="fa fa-th-large" aria-hidden="true"></i>
            </button>
        </div>
        
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link" data-bs-toggle="collapse" data-bs-target="#fileManager" aria-expanded="false" aria-controls="fileManager">
                    <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                    <span>File Manager</span>
                    
                    <ul id="fileManager" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span>Employee Monitoring</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                                <span>Activity</span>
                            </a>
                        </li>
                    </ul>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                    <span>Notification</span>
                </a>
            </li>

        </ul>

        <div class="sidebar-footer">
            <a href="" class="sidebar-link">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <div class="main p-3 min-vh-100">
        <div class="text-center">
            <p class="h2">Project</p>
        </div>
    </div>
    <!-- <div class="row min-vh-100">
        <div class="col-md-3 bg-dark">
            <div class="sidebar">
                
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="table-responsive">
                <p class="h4 mb-4 mt-2">Attendance Monitoring</p>
                <table class="table">
                    <caption>
                        Description of the table.
                    </caption>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>employee</th>
                            <th>activity</th>
                            <th>description</th>
                            <th>start time</th>
                            <th>end time</th>
                            <th>total time</th>
                            <th>Submitted by</th>
                            <th>Submitted in</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($i = 0; $i <  5; $i++):
                        ?>
                        <tr>
                            <td>1</td>
                            <td>Sample employee</td>
                            <td>Attendance</td>
                            <td>sample description</td>
                            <td>11/11/24</td>
                            <td>11/12/24</td>
                            <td>22</td>
                            <td>sample employee</td>
                            <td>11.11.1</td>
                            <td>
                                <button class="btn btn-primary me-2">btn1</button>
                                <button class="btn btn-secondary">btn2</button>
                            </td>
                        </tr>

                        <?php
                            endfor;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
</div>
<?php
    require_once ('client/footer.php');
?>
