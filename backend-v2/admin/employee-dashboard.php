<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Employees</h1>
        <a href="./index.php?page=employee-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add Employee</a>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                echo $con->query("SELECT * FROM employees;")->num_rows . ' ' . 'Employees';
                                                                                ?></div>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Conformed</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                echo $con->query("SELECT * FROM employees WHERE emp_confirmation_date <> '0000-00-00';")->num_rows . ' ' . 'Employees';
                                                                                ?></div>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Interns
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                echo $con->query("SELECT * FROM employees WHERE emp_designation='Intern';")->num_rows . ' ' . 'Employees';
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
                    <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Emp Code</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Joining Date</th>
                                    <th>Leaving Date</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = $con->query("SELECT * FROM  employees;");
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['emp_code'] ?></th>
                                        <td><?php echo $row['emp_first_name'] . " " . $row['emp_last_name']  ?></td>
                                        <td><?php echo $row['emp_email'] ?></td>
                                        <td><?php echo $row['emp_joining_date'] ?></td>
                                        <td><?php
                                            if ($row['emp_leaving_date'] == '0000-00-00') {
                                                echo "";
                                            } else {
                                                echo $row['emp_leaving_date'];
                                            }
                                            ?></td>
                                        <td><?php echo $row['emp_department'] ?></td>
                                        <td><?php echo $row['emp_designation'] ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <div class="dropdown no-arrow">
                                                <a class="nav-link dropdown-toggle text-dark" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in" aria-labelledby="productDropdown">
                                                    <a type="button" class="dropdown-item" href="./index.php?page=employee-viewer&empId=<?php echo $row['emp_id'] ?>&content=employee">View</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a type="button" class="dropdown-item" href="./index.php?page=employee-edit&empId=<?php echo $row['emp_id'] ?>">Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a type="button" class="dropdown-item" id="deleteEmp" href="#" data-id="<?php echo $row['emp_id'] ?>">Delete</a>
                                                </div>
                                            </div>
                                        </td>
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


<div class="modal" id="openModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding: 0.5rem 1rem; background:#3e64d3;color:#fff">
                <h5 class="modal-title" id="addStatusModalLabel">Delete Employee</h5>
                <button type="button" class="close closeModal" style="color:#fff">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to remove employee permanently?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeModal">No</button>
                <button type="button" class="btn btn-primary" id="submitModel">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let id = '';
        $('#openModal').hide();
        $(document).on('click', '#deleteEmp', function(e) {
            e.preventDefault();
            id = $(this).data('id');
            $('#openModal').show();
        });
        $('.closeModal').click(() => {
            $('#openModal').hide();
        });

        $('#submitModel').click(() => {
            $('#openModal').hide();
            $.ajax({
                url: './php/actions.php?action=delete_employee',
                method: 'POST',
                data: {
                    emp_id: id
                },
                success: function(resp) {
                    if (resp == 1) {
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        console.log(resp);
                    }
                },
                error: function(resp) {
                    console.log(resp);
                }
            });
        });
    });
</script>