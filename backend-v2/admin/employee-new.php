<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Employee</h1>
        <a href="./index.php?page=employee-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>Employee</a>
    </div>

    <div class="row add-employee-form">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                </div>
                <div class="card-body">
                    <form id="new_employee_form">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="emp_first_name" class="col-form-label mr-1">First Name</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" id="emp_first_name" name="emp_first_name" autocomplete="off" autofocus>
                            </div>
                            <div class="col-sm-6">
                                <label for="emp_last_name" class="col-form-label mr-1">Last Name</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" id="emp_last_name" name="emp_last_name" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="emp_gender" class="col-form-label mr-1">Gender</label><span class="text-danger">*</span>
                                <select class="form-control custom-select" id="emp_gender" name="emp_gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="emp_dob" class="col-form-label mr-1">Date Of Birth</label><span class="text-danger">*</span>
                                <input type="date" class="form-control" id="emp_dob" name="emp_dob">
                            </div>
                            <div class="col-sm-4">
                                <label for="emp_mob" class="col-form-label mr-1">Mobile No.</label><span class="text-danger">*</span>
                                <input type="tel" class="form-control" id="emp_mob" name="emp_mob" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emp_description" class="col-form-label mr-1">Description</label>
                            <textarea type="text" class="form-control" id="emp_description" name="emp_description" autocomplete="off"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="emp_email" class="col-form-label mr-1">Email Address</label><span class="text-danger">*</span>
                            <input type="email" class="form-control" id="emp_email" name="emp_email" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="emp_address" class="col-form-label mr-1">Resident Address</label>
                            <textarea type="text" class="form-control" id="emp_address" name="emp_address" autocomplete="off"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="emp_department" class="col-form-label mr-1">Department</label><span class="text-danger">*</span>
                            <select class="form-control custom-select" id="emp_department" name="emp_department">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="emp_hod_name" class="col-form-label mr-1">Hade Of Department</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="emp_hod_name" name="emp_hod_name" autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <label for="emp_designation" class="col-form-label mr-1">Designation</label><span class="text-danger">*</span>
                            <select class="form-control custom-select" id="emp_designation" name="emp_designation">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="emp_joining_date" class="col-form-label mr-1">Joining Date</label><span class="text-danger">*</span>
                                <input type="date" class="form-control" id="emp_joining_date" name="emp_joining_date" autocomplete="off">
                            </div>
                            <div class="col-sm-6">
                                <label for="emp_confirmation_date" class="col-form-label mr-1">Confirmation Date</label>
                                <input type="date" class="form-control" id="emp_confirmation_date" name="emp_confirmation_date" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="emp_leaving_date" class="col-form-label mr-1">Leaving Date</label>
                                <input type="date" class="form-control" id="emp_leaving_date" name="emp_leaving_date" autocomplete="off">
                            </div>
                            <div class="col-sm-6">
                                <label for="emp_working_hours" class="col-form-label mr-1">Working Hours</label><span class="text-danger">*</span>
                                <input type="time" class="form-control" id="emp_working_hours" name="emp_working_hours" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emp_profile_pic" class="col-form-label mr-1">Profile Picture</label>
                            <input type="file" class="custom-file" id="emp_profile_pic" name="emp_profile_pic" autocomplete="off" onchange="preview()">
                            <img id="thumb" src="" width="100px" />
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button class="btn btn-primary btn-user btn-block">Submit Details</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="./index.php?page=employee-dashboard" class="btn btn-warning btn-user btn-block text-dark">Back to Employees List</a>
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
        $('#new_employee_form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: './php/actions.php?action=save_employee',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(resp) {
                    console.log(resp);
                    if (resp == 1) {
                        $('#add-employee-form').append(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Updated Successfully</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    } else {
                        $('#add-employee-form').append(`
                        <div class="alert alert-danger fade show" role="alert">
                            <strong>Data Updated Unsuccessfully</strong>
                        </div>
                    `);
                    }
                }
            })
        });
    });
</script>