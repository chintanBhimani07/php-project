<main id="main" class="main">
    <div class="pagetitle">
        <h1>Employees</h1>
        <nav>
            <ol class="breadcrumb" style="user-select:none;">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Employees</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xxl-3">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Total Work</h5>

                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../assets/img/totalWork.png" alt="" srcset="">
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3">
                        <div class="card info-card revenue-card ">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Completed Work</h5>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../assets/img/complateWork.png" alt="" srcset="">
                                    </div>
                                    <div class="ps-3">
                                        <h6>$3,264</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Pending Leaves</h5>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../assets/img/pendingWork.png" alt="" srcset="">
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>
                                        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Pending Tours</h5>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../assets/img/pendingWork.png" alt="" srcset="">
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>
                                        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-2 tableComponent" style="overflow-x:auto; height:50vh;">
                <table id="table" class="table table-striped ">

                    <thead style="position:sticky;top: 0 ;" class="bg bg-light">
                        <tr>
                            <th scope="col">Sr. No</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Department Name</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Hade Of Department</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $type = array('', "Admin", "Project Manager", "Employee");
                        $qry = $conn->query("SELECT * FROM  employees order by emp_full_name asc");
                        while ($row = $qry->fetch_assoc()) { ?>
                            <tr>
                                <th scope="row"><?php echo $i++ ?></th>
                                <td><?php echo $row['emp_full_name'] ?></td>
                                <td><?php echo $row['emp_email'] ?></td>
                                <td><?php echo $row['emp_department_name'] ?></td>
                                <td><?php echo $row['emp_designation'] ?></td>
                                <td><?php echo $row['hod'] ?></td>
                                <td>
                                    <a type="button" class="btn btn-primary viewEmployee" href="./index.php?page=view_employee&id=<?php echo $row['emp_id'] ?>">View</a>
                                    <a type="button" class="btn btn-warning editEmployee" href="./index.php?page=edit_employee&id=<?php echo $row['emp_id'] ?>">Edit</a>
                                    <a type="button" class="btn btn-danger deleteEmployee" href="javascript:void(0)" data-id="<?php echo $row['emp_id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>


<script>
    $(document).ready(function() {
        $('.deleteEmployee').click(function() {
            let id = $(this).data("id");
            $.ajax({
                url: 'ajax.php?action=delete_employee',
                method: 'POST',
                data: {
                    emp_id: id
                },
                success: function(resp) {
                    if (resp == 1) {
                        $('.tableComponent').prepend(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Deleted Successfully</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
                        setTimeout(function() {
                            location.reload()
                        }, 4000)

                    }
                }
            })
        })
    })
    $(document).ready(function() {
        $('.viewEmployee').click(function() {
            e.preventDefault();
            $.ajax({
                url: 'view_employee.php?empId=' + $(this).attr('value'),
                cache: false,
                contentType: false,
                processData: false,
                method: 'GET',
                type: 'GET',
                success: function(resp) {
                    console.log(resp);
                }
            })
        })
    })
    // $(document).ready(function() {
    //     $('.editEmployee').click(function(e) {
    //         e.preventDefault();

    //         $.ajax({
    //             url: 'add_employee.php?empId='+$(this).attr('value'),
    //             cache: false,
    //             contentType: false,
    //             processData: false,
    //             method: 'GET',
    //             type: 'GET',
    //             success: function(resp) {
    //                 if (resp == 1) {
    //                     $('.section').prepend(`
    //               <div class="alert alert-success alert-dismissible fade show" role="alert">
    //                 <strong>Employee Added Successfully</strong>
    //                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //               </div>
    //               `);
    //                 } else {
    //                     $('.section').prepend(`
    //               <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                 <strong>Employee already exists</strong>
    //                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //               </div>
    //               `);
    //                 }
    //             }
    //         })
    //     })
    // });
</script>