<main id="main" class="main">
    <div class="pagetitle">
        <h1>Employees</h1>
        <nav>
            <ol class="breadcrumb" style="user-select:none;">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Employees</li>
                <li class="breadcrumb-item active">New Employees</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <form class="row g-4" id="addNewEmployee">
            <?php if (isset($emp_email)) {
                $id = (int)$emp_email;    
            ?>
                <input type="hidden" class="form-control" id="emp_id" value="<?php echo isset($emp_id) ? $id : 0 ?>" name="emp_id" required>            
            <?php } ?>
            <div class="col-md-12">
                <label for="emp_full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="emp_full_name" value="<?php echo isset($emp_full_name) ? $emp_full_name : '' ?>" name="emp_full_name" required>
            </div>
            <div class="col-md-12">
                <label for="emp_email" class="form-label">Emial Address</label>
                <input type="text" class="form-control" id="emp_email" name="emp_email" value="<?php echo isset($emp_email) ? $emp_email : '' ?>"  <?php echo isset($emp_email) ? 'disabled': '' ?>>
            </div>
            <div class="col-md-6">
                <label for="emp_gender" class="form-label">Gender</label>
                <select id="emp_gender" class="form-select" name="emp_gender" required>
                    <option value='0'>Select Gender</option>
                    <option value='male' <?php if (isset($emp_gender)) {
                               echo ($emp_gender) == 'male' ? 'selected' : ''; } ?>>Male</option>
                    <option value='female'<?php if (isset($emp_gender)) {
                               echo ($emp_gender) == 'female' ? 'selected' : ''; } ?>>Female</option>
                    <option value='other' <?php if (isset($emp_gender)) {
                               echo ($emp_gender) == 'other' ? 'selected' : ''; } ?>>Other</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="emp_mob" class="form-label">Mobile Number</label>
                <input type="text" name="emp_mob" id="emp_mob" class="form-control" value="<?php echo isset($emp_mob) ? $emp_mob : '' ?>" required>
            </div>
            <div class="col-md-6">
                <label for="emp_dob" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" id="emp_dob" name="emp_dob" value="<?php echo isset($emp_dob) ? $emp_dob : '' ?>" required>
            </div>
            <div class="col-md-6">
                <label for="emp_working_time" class="form-label">Working Hours</label>
                <input type="time" name="emp_working_time" id="emp_working_time" class="form-control" value="<?php echo isset($emp_working_time) ? $emp_working_time : '' ?>" required>
            </div>
            <div class="col-md-12">
                <label for="emp_address" class="form-label">Address</label>
                <input type="text" name="emp_address" id="emp_address" class="form-control" value="<?php echo isset($emp_address) ? $emp_address : '' ?>" required>
            </div>
            <div class="col-md-4">
                <label for="emp_joining_date" class="form-label">Joining Date</label>
                <input type="date" class="form-control" id="emp_joining_date" name="emp_joining_date" value="<?php echo isset($emp_joining_date) ? $emp_joining_date : '' ?>" required>
            </div>
            <div class="col-md-4">
                <label for="emp_confirmation_date" class="form-label">confirm Date</label>
                <input type="date" class="form-control" id="emp_confirmation_date" name="emp_confirmation_date" value="<?php echo isset($emp_confirmation_date) ? $emp_confirmation_date : '' ?>" required>
            </div>
            <div class="col-md-4">
                <label for="emp_leaving_date" class="form-label">Leaving Date</label>
                <input type="date" class="form-control" id="emp_leaving_date" name="emp_leaving_date" value="<?php echo isset($emp_leaving_date) ? $emp_leaving_date : '' ?>">
            </div>
            <input type="hidden" class="form-control" id="hod" name="hod" value=null>
            

            <div class="col-md-12">
                <label for="emp_department_name" class="form-label">Department</label>
                <select id="emp_department_name" class="form-select" name="emp_department_name" value="<?php echo isset($emp_department_name) ? $emp_department_name : '' ?>" required>
                    <option>Select Department</option>
                    <?php
                    $department = $conn->query("SELECT * FROM departmets;");
                    while ($row = $department->fetch_assoc()) { ?>
                        <option value="<?php echo $row['deprt_name'] ?>" <?php if (isset($emp_department_name)) {
                               echo (($emp_department_name) == $row['deprt_name']) ? 'selected' : ''; } ?>><?php echo $row['deprt_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-12">
                <label for="emp_designation" class="form-label">Designation</label>
                <input type="text" name="emp_designation" id="emp_designation" class="form-control" value="<?php echo isset($emp_designation) ? $emp_designation : '' ?>" required>
            </div>
            <div class="col-md-12">
                <label for="avatar" class="form-label">Profile Photo</label>
                <input type="file" class="form-control" id="avatar" name="profile_pic" onchange="displayImg(this,$(this))" required>
            </div>
            <input type="hidden" name="hod" id="hod" class="form-control" value=null>
            <div class="col-12">
                <button type="submit" class="btn btn-success w-100 my-1">Submit</button>
                <button type="button" class="btn btn-warning w-100 my-1" onclick="location.href='index.php?page=empList'">Cancel</button>
            </div>
        </form>
    </section>
</main>


<script>
    $('#addNewEmployee').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'ajax.php?action=save_employee',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                console.log(resp);
                if (resp == 1) {
                    $('.section').append(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Updated Successfully</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                } else {
                    $('.section').append(`
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Updated Unsuccessfully</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              `);
                }
            }
        })
    });
    function displayImg(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#addApplicationUser').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'ajax.php?action=add_application_user',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(resp) {
                    if (resp == 1) {
                        console.log(resp);
                        // setTimeout(function() {
                        //     location.replace('index.php?page=userList')
                        // }, 3000)
                    } else if (resp == 2) {
                        // $('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
                        // $('[name="email"]').addClass("border-danger")
                        // end_load()
                        console.log('error');
                    }
                }
            })
        })
    })
</script>