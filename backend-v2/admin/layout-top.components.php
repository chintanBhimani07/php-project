<div id="wrapper">
    <!-- sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="main_dashboard">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./index.php?page=home">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-solid fa-building-columns"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Company</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="./index.php?page=home">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <!-- <div class="sidebar-heading">
            Interface
        </div> -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#employee_dashboard" aria-expanded="true" aria-controls="employee_controls">
                <i class="fas fa-fw fa-users-gear"></i>
                <span>Employee</span>
            </a>
            <div id="employee_dashboard" class="collapse" aria-labelledby="employee_lable" data-parent="#main_dashboard">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="./index.php?page=employee-dashboard">All Employees</a>
                    <a class="collapse-item" href="./index.php?page=employee-new">New Employee</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user_dashboard" aria-expanded="true" aria-controls="employee_controls">
                <i class="fa-solid fa-person-circle-check"></i>
                <span>Application Users</span>
            </a>
            <div id="user_dashboard" class="collapse" aria-labelledby="employee_lable" data-parent="#main_dashboard">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="./index.php?page=user-dashboard">All User</a>
                    <a class="collapse-item" href="./index.php?page=user-new">New User</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#project_dashboard" aria-expanded="true" aria-controls="project_controls">
                <i class="fa-solid fa-list-check"></i>
                <span>Projects</span>
            </a>
            <div id="project_dashboard" class="collapse" aria-labelledby="project_lable" data-parent="#main_dashboard">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="./index.php?page=project-dashboard">Dashboard</a>
                    <a class="collapse-item" href="./index.php?page=project-new">New Project</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#client_dashboard" aria-expanded="true" aria-controls="project_controls">
                <i class="fa-solid fa-user-plus"></i>
                <span>Clients</span>
            </a>
            <div id="client_dashboard" class="collapse" aria-labelledby="project_lable" data-parent="#main_dashboard">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="./index.php?page=client-dashboard">Dashboard</a>
                    <a class="collapse-item" href="./index.php?page=client-new">New Client</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php?page=task-dashboard">
                <i class="fa-solid fa-briefcase"></i>
                <span>Work Collector</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php?page=project-report">
                <i class="fa-solid fa-flag"></i>
                <span>Project Progress Report</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="./index.php?page=hod-dashboard">
                <i class="fa-solid fa-building-user"></i>
                <span>Head Of Departments</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="./index.php?page=expenses-dashboard">
                <i class="fa-solid fa-wallet"></i>
                <span>Expenses</span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            $userEmail = $_SESSION['login_user_email'];
                            $qry = $con->query("SELECT emp_profile_pic FROM employees WHERE emp_email='$userEmail'");
                            while ($row = $qry->fetch_assoc()) { ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['login_user_first_name'] . " " . $_SESSION['login_user_last_name'] ?>
                                </span>
                                <img class="img-profile rounded-circle" src="./assets/uploads/<?php echo $row['emp_profile_pic']; ?>">
                            <?php } ?>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <h6 class="text-center font-weight-bolder">
                                <?php if ($_SESSION['login_user_access_type'] == 1) {
                                    echo 'Administrator';
                                } else if ($_SESSION['login_user_access_type'] == 2) {
                                    echo 'Employee';
                                } else if ($_SESSION['login_user_access_type'] == 3) {
                                    echo 'Engineer';
                                } else if ($_SESSION['login_user_access_type'] == 4) {
                                    echo 'HOD';
                                } ?>
                            </h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./index.php?page=employee-viewer&empId=<?php echo $_SESSION['login_emp_id'] ?>&content=user&isProfile=true">
                                <i class="fa-solid fa-user mr-2"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="./index.php?page=user-change-password">
                                <i class="fa-solid fa-unlock mr-2"></i>
                                Change Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./user-logout.php">
                                <i class="fa-solid fa-right-from-bracket mr-2"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>