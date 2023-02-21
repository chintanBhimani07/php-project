<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Users</h1>
        <a href="./index.php?page=user-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add User</a>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Aceess Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $qry = $con->query("SELECT * FROM  users;");
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i++ ?>
                                        </th>
                                        <td>
                                            <?php
                                            $empId = $row['emp_id'];
                                            $q = $con->query("SELECT emp_first_name,emp_last_name FROM employees WHERE emp_id='$empId'");
                                            while ($r = $q->fetch_assoc()) {
                                                echo $r['emp_first_name'] . " " . $r['emp_last_name'];
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $row['user_email'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($row['user_access_type'] == 1){
                                                echo "Admin";
                                            }else if($row['user_access_type'] == 2){
                                                echo "Employee";
                                            }else if($row['user_access_type'] == 3){
                                                echo "HOD";
                                            }else{
                                                echo "Engineer";
                                            }
                                            ?>
                                        </td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a type="button" class="btn btn-warning  btn-circle editUser mx-1" href="./index.php?page=user-edit&userId=<?php echo $row['user_id'] ?>"><i class="fa-solid fa-user-pen"></i></a>
                                            <a type="button" class="btn btn-danger  btn-circle  mx-1" href="#" data-toggle="modal" data-target="#deleteUserModal" ><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                                    <button class="btn btn-danger deleteUser" data-dismiss="modal" id="<?php echo $row['user_id'] ?>">Delete</button>
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


    <script>
        $(document).ready(function() {
            $('.deleteUser').click(function() {
                // console.log('click');
                let id = $(this).attr('id');
                $.ajax({
                    url: './php/actions.php?action=delete_user',
                    method: 'POST',
                    data: {
                        user_id: id
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