<?php
include '../config/db.config.php';
$qry = $conn->query("SELECT * FROM employees Where emp_id=" . $_GET['id'])->fetch_array();
foreach ($qry as $k => $v) {
    $$k = $v;
}
?>
<main id="main" class="main">
    <h2>Add Application User</h2>
    <section class="section dashboard">
        <form class="row g-4" id="addApplicationUser">
            <input type="hidden" class="form-control" id="fullName" name="fullName" value="<?php echo isset($emp_full_name) ? $emp_full_name : '' ?>" required>
            <input type="hidden" class="form-control" id="email" name="email" value="<?php echo isset($emp_email) ? $emp_email : '' ?>" required>
            <div class="col-md-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="col-md-12">
                <label for="type" class="form-label">User Type</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="0">Select Type</option>
                    <option value="1">Admin</option>
                    <option value="2">Employee</option>
                    <option value="3">Engineer</option>
                </select>
            </div>
            <input type="hidden" class="form-control" id="avatar" value="<?php echo isset($profile_pic) ? $profile_pic : '' ?>" name="avatar" required>

            <div class="col-12">
                <button type="submit" class="btn btn-success w-100 my-1">Submit</button>
                <button type="button" class="btn btn-warning w-100 my-1" onclick="location.href='index.php?page=empList'">Cancel</button>
            </div>
        </form>
    </section>
</main>


<script>
    $(document).ready(function() {
        $('#addApplicationUser').submit(function(e) {
            e.preventDefault();
            console.log(1);
            $.ajax({
                url: 'ajax.php?action=add_application_user',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(resp) {
                    console.log(resp);
                    if (resp == 1) {
                        setTimeout(function() {
                            location.replace('index.php?page=userList');
                        }, 3000)
                    } else if (resp == 2) {
                        $('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
                        $('[name="email"]').addClass("border-danger")
                        end_load()
                        console.log('error');
                    }
                }
            })
        })
    })
</script>