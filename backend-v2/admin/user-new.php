<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New User</h1>
        <a href="./index.php?page=user-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>Users</a>
    </div>
    <div class="row add-employee-form">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                </div>
                <div class="card-body">
                    <form id="new_user_form">
                        <div class="form-group ">
                            <label for="user_email" class="col-form-label mr-1">Email Address</label><span class="text-danger">*</span>
                            <select class="form-control custom-select" id="user_email" name="user_email" autofocus required>
                                <option value="0">Select Email</option>
                                <?php
                                $qry = $con->query("SELECT emp_email FROM employees;");
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['emp_email'] ?>"><?php echo $row['emp_email'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_password" class="col-form-label mr-1">Password</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="user_password" name="user_password" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="user_access_type" class="col-form-label mr-1">Access Type</label><span class="text-danger">*</span>
                            <select class="form-control custom-select" id="user_access_type" name="user_access_type" required>
                                <option value="2">Employee</option>
                                <option value="1">Admin</option>
                                <option value="4">MDO</option>
                                <option value="3">Engineer</option> 
                            </select>   
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button class="btn btn-primary btn-user btn-block">Submit Details</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="./index.php?page=user-dashboard" class="btn btn-warning btn-user btn-block text-dark">Back to User List</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function preview() {
        thumb.src = URL.createObjectURL(event.target.files[0]);
    }
    $(document).ready(function() {
        $('#new_user_form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: './php/actions.php?action=save_user',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(resp) {
                    if (resp == 1) {
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        console.log(resp);
                    }
                }
            })
        });
    });
</script>