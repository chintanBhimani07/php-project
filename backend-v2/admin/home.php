<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Employees</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 d-flex align-items-center justify-content-between">
                                <div>
                                    <?php echo  $con->query("SELECT * FROM employees;")->num_rows ?>
                                </div>
                                <div style="font-size:2rem">
                                    <i class="fas fa-fw fa-users-gear"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Application Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 d-flex align-items-center justify-content-between">
                                <div>
                                    <?php echo  $con->query("SELECT * FROM users;")->num_rows ?>
                                </div>
                                <div style="font-size:2rem">
                                    <i class="fa-solid fa-person-circle-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Projects</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 d-flex align-items-center justify-content-between">
                                <div>
                                    <?php echo  $con->query("SELECT * FROM projects;")->num_rows ?>
                                </div>
                                <div style="font-size:2rem">
                                    <i class="fa-solid fa-list-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Assigned Task</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 d-flex align-items-center justify-content-between">
                                <div>
                                    <?php echo  $con->query("SELECT * FROM task;")->num_rows ?>
                                </div>
                                <div style="font-size:2rem">
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-dangers shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Clients</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 d-flex align-items-center justify-content-between">
                                <div>
                                    <?php echo  $con->query("SELECT * FROM clients;")->num_rows ?>
                                </div>
                                <div style="font-size:2rem">
                                    <i class="fa-solid fa-user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Engineers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 d-flex align-items-center justify-content-between">
                                <div>
                                    <?php echo  $con->query("SELECT * FROM employees WHERE emp_designation='Engineer';")->num_rows ?>
                                </div>
                                <div style="font-size:2rem">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->