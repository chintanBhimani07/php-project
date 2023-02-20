<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Head Of Departments</h1>
        <a href="./index.php?page=hod-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add HOD</a>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                No. Of HOD</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                echo ($con->query("SELECT * FROM  hod;")->num_rows);
                                                                                ?></div>
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
                    <h6 class="m-0 font-weight-bold text-primary">HOD List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $qry = $con->query("SELECT * FROM  hod;");
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++ ?></th>
                                        <td><?php echo $row['hod_first_name'] ?></td>
                                        <td><?php echo $row['hod_last_name'] ?></td>
                                        <td><?php
                                            $departmentId = $row['department_id'];
                                            $query = $con->query("SELECT department_name FROM  departments WHERE department_id='$departmentId';");
                                            while ($row = $query->fetch_assoc()) {
                                                echo $row['department_name'];
                                            }
                                            ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a type="button" class="btn btn-primary btn-circle viewEmployee mx-1" href="./index.php?page=department-viewer&empId=<?php echo $row['hod_id'] ?>"><i class="fa-solid fa-eye"></i></a>
                                            <a type="button" class="btn btn-warning  btn-circle editEmployee mx-1" href="./index.php?page=department-edit&empId=<?php echo $row['hod_id'] ?>"><i class="fa-solid fa-user-pen"></i></a>
                                            <a type="button" class="btn btn-danger  btn-circle  mx-1" href="#" data-toggle="modal" data-target="#deleteDepartmentModal"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">This field Permanently Deleted.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <button class="btn btn-danger deleteHod" data-dismiss="modal" id="<?php echo $row['hod_id'] ?>">Delete</button>
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
        $('.deleteHod').click(function() {
            console.log('click');
            let id = $(this).attr('id');
            $.ajax({
                url: './php/actions.php?action=delete_hod',
                method: 'POST',
                data: {
                    hod_id: id
                },
                success: function(resp) {
                    console.log(resp);
                    if (resp == 1) {
                        $('.tableComponent').prepend(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Deleted Successfully</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
                        setTimeout(function() {
                            location.reload()
                        }, 2000)

                    }
                }
            });
        });
    });
</script>