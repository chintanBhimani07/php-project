<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Department Dashboard</h1>
        <a href="./index.php?page=department-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add Department</a>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Departments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
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
                    <h6 class="m-0 font-weight-bold text-primary">Departments List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Department Name</th>
                                    <th>Head Of Department</th>
                                    <th>No. Of Employees</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $qry = $con->query("SELECT * FROM  departments;");
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++ ?></th>
                                        <td><?php echo $row['department_name'] ?></td>
                                        <td><?php echo $row['department_hod'] ?></td>
                                        <td><?php echo $row['department_employees'] ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a type="button" class="btn btn-primary btn-circle viewEmployee mx-1" href="./index.php?page=department-viewer&empId=<?php echo $row['department_id'] ?>"><i class="fa-solid fa-eye"></i></a>
                                            <a type="button" class="btn btn-warning  btn-circle editEmployee mx-1" href="./index.php?page=department-edit&empId=<?php echo $row['department_id'] ?>"><i class="fa-solid fa-user-pen"></i></a>
                                            <a type="button" class="btn btn-danger  btn-circle  mx-1" href="#" data-toggle="modal" data-target="#deleteDepartmentModal" ><i class="fa-solid fa-trash"></i></a>
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
                                                    <button class="btn btn-danger deleteEmployee" data-dismiss="modal" id="<?php echo $row['department_id'] ?>">Delete</button>
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
        $('.deleteEmployee').click(function() {
            console.log('click');
            let id = $(this).attr('id');
            $.ajax({
                url: './php/actions.php?action=delete_employee',
                method: 'POST',
                data: {
                    emp_id: id
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