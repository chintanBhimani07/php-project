<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
    </div>
    <div class="row add-employee-form">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                </div>
                <div class="card-body">
                    <form id="change_user_form">
                        <input type="hidden" class="form-control mb-5" id="user_id" name="user_id" value="<?php echo $_SESSION['login_user_id'] ?>">
                        <div class="form-group ">
                            <label for="user_old_password" class="col-form-label mr-1">Old Password</label><span
                                class="text-danger">*</span>
                            <input type="text" class="form-control mb-2" id="user_old_password"
                                name="user_old_password" placeholder="Enter Old Password" autocomplete="off" autofocus
                                required>
                        </div>
                        <div class="form-group">
                            <label for="user_password" class="col-form-label mr-1">New Password</label><span
                                class="text-danger">*</span>
                            <input type="text" class="form-control mb-5" id="user_password" name="user_password"
                                placeholder="Enter New Password" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-user btn-block" type="submit">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#change_user_form').submit(function(e) {
            e.preventDefault();
            
            $.ajax({
                url: './php/actions.php?action=change_password',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(resp) {
                    console.log(resp);
                    if (resp == 1) {
                        setTimeout(() => {
                            window.location = './index.php';
                        }, 1000);
                    } else {
                        console.log(resp);
                    }
                }
            })
        });
    });
</script>