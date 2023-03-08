<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Projects</h1>
        <?php if ($_SESSION['login_user_access_type'] == 1) { ?>
            <a href="./index.php?page=project-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add Project</a>
        <?php } ?>
    </div>
    <?php if ($_SESSION['login_user_access_type'] == 1) { ?>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo  $con->query("SELECT * FROM projects;")->num_rows . ' ' . 'Projects' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Running</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $con->query("SELECT * FROM projects WHERE project_status='Running';")->num_rows . ' ' . 'Projects'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Completed</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <?php echo $con->query("SELECT * FROM projects WHERE project_status='Complete';")->num_rows . ' ' . 'Projects'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $con->query("SELECT * FROM projects WHERE project_status='Hold';")->num_rows . ' ' . 'Projects'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Project List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Project</th>
                                    <th>Client</th>
                                    <th>HOD</th>
                                    <th>Start</th>
                                    <th>Finish</th>
                                    <th>Status</th>
                                    <?php 
                                    if($_SESSION['login_user_access_type'] == 1){ ?>
                                        <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = '';
                                $i = 1;
                                if ($_SESSION['login_user_access_type'] == 2) {
                                    $userId = $_SESSION['login_user_id'];
                                    $qry = $con->query("SELECT * FROM  projects WHERE FIND_IN_SET('$userId', users_id);");
                                }else if($_SESSION['login_user_access_type'] == 4){
                                    $empId = $_SESSION['login_emp_id'];
                                    $hodQry= $con->query("SELECT hod_id FROM hod WHERE emp_id='$empId'");
                                    while($h = $hodQry->fetch_assoc()){
                                        $hodId = $h['hod_id'];
                                        $qry = $con->query("SELECT * FROM projects WHERE hod_id='$hodId'"); 
                                    }
                                }else if($_SESSION['login_user_access_type'] == 3){

                                }else if($_SESSION['login_user_access_type'] == 1){
                                    $qry = $con->query("SELECT * FROM  projects;");
                                }
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i++ ?>
                                        </th>
                                        <td>
                                            <?php echo $row['project_name'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            $clientId = $row['client_id'];
                                            $client = $con->query("SELECT client_first_name,client_last_name FROM clients WHERE client_id='$clientId'");
                                            while ($data = $client->fetch_assoc()) {
                                                echo $data['client_first_name'] . " " . $data['client_last_name'];
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $hodId = $row['hod_id'];
                                            $hod = $con->query("SELECT hod_first_name,hod_last_name FROM hod WHERE hod_id='$hodId'");
                                            while ($data = $hod->fetch_assoc()) {
                                                echo $data['hod_first_name'] . " " . $data['hod_last_name'];
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $row['start_date'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['expected_end_date'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['project_status'] ?>
                                        </td>
                                        <?php
                                        if($_SESSION['login_user_access_type'] == 1){ ?>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a type="button" class="btn btn-primary btn-circle mx-1" href="./index.php?page=project-viewer&projectId=<?php echo $row['project_id'] ?>"><i class="fa-solid fa-eye"></i></a>
                                            <a type="button" class="btn btn-warning  btn-circle mx-1" href="./index.php?page=project-edit&projectId=<?php echo $row['project_id'] ?>"><i class="fa-solid fa-user-pen"></i></a>
                                            <a type="button" class="btn btn-danger  btn-circle deleteProject  mx-1" href="#" data-id="<?php echo $row['project_id'] ?>"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.deleteProject').click(function() {
            // console.log('click');
            let id = $(this).attr('id');
            $.ajax({
                url: './php/actions.php?action=delete_project',
                method: 'POST',
                data: {
                    project_id: id
                },
                success: function(resp) {
                    if (resp == 1) {
                        setTimeout(function() {
                            location.reload()
                        }, 1000)

                    } else {
                        console.log(resp);
                    }
                }
            });
        });
    });
</script>