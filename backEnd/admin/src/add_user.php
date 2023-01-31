<main id="main" class="main">
    <h2>Add Application User</h2>
    <section class="section dashboard">
        <form class="row g-4" id="addApplicationUser">
            <div class="col-md-12">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="col-md-12">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
            <div class="col-md-12">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
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
            <div class="col-md-12">
                <label for="avatar" class="form-label">Profile Photo</label>
                <input type="file" class="form-control" id="avatar" name="avatar" onchange="displayImg(this,$(this))" required>
            </div>
            <div>
                <img src="<?php echo isset($avatar) ? 'assets/uploads/' . $avatar : '' ?>" alt="Avatar" id="image" class="img-fluid img-thumbnail ">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success w-100 my-1">Submit</button>
                <button type="button" class="btn btn-warning w-100 my-1" onclick="location.href='index.php?page=empList'">Cancel</button>
            </div>
        </form>
    </section>
</main>

<script>
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