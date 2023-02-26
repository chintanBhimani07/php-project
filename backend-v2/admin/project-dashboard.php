<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Projects</h1>
        <a href="./index.php?page=project-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add Project</a>
    </div>
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
                                <?php echo $con->query("SELECT * FROM projects WHERE project_status='running';")->num_rows . ' ' . 'Projects'; ?>
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
                                <?php echo $con->query("SELECT * FROM projects WHERE project_status='completed';")->num_rows . ' ' . 'Projects'; ?>
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
                                <?php echo $con->query("SELECT * FROM projects WHERE project_status='pending';")->num_rows . ' ' . 'Projects'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $qry = $con->query("SELECT * FROM  projects;");
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
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a type="button" class="btn btn-primary btn-circle viewEmployee mx-1" href="./index.php?page=project-viewer&projectId=<?php echo $row['project_id'] ?>"><i class="fa-solid fa-eye"></i></a>
                                            <a type="button" class="btn btn-warning  btn-circle editEmployee mx-1" href="./index.php?page=project-edit&projectId=<?php echo $row['project_id'] ?>"><i class="fa-solid fa-user-pen"></i></a>
                                            <a type="button" class="btn btn-danger  btn-circle  mx-1" href="#" data-toggle="modal" data-target="#deleteProjectModal"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure want to
                                                        delete?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">This field Permanently Deleted.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <button class="btn btn-danger deleteProject" data-dismiss="modal" id="<?php echo $row['project_id'] ?>">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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