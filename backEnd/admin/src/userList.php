<main id="main" class="main">
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb" style="user-select:none;">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Employees</li>
                <li class="breadcrumb-item">Application</li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 mt-2 tableComponent" style="overflow-x:auto; min-height:70vh;">
                <table id="table" class="table table-striped ">
                    <thead style="position:sticky;top: 0 ;" class="bg bg-light">
                        <tr>
                            <th scope="col">Sr. No</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">User Type</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $type = array('', "Admin", "Project Manager", "Employee");
                        $qry = $conn->query("SELECT * FROM  users order by fullName asc");
                        while ($row = $qry->fetch_assoc()) { ?>
                            <tr>
                                <th scope="row"><?php echo $i++ ?></th>
                                <td><?php echo $row['fullName'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php if($row['type'] == 1) {
                                    echo 'Administrator';
                                }else if($row['type'] == 2){
                                    echo 'Employee';
                                } else if ($row['type'] == 3) {
                                    echo 'Engineer';
                                }?></td>
                                <td>
                                    <a type="button" class="btn btn-warning editEmployee" href="./index.php?page=edit_employee&id=<?php echo $row['id'] ?>">Edit</a>
                                    <a type="button" class="btn btn-danger deleteEmployee" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
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