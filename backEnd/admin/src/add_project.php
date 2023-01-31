<?php
include '../config/db.config.php';

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Project Status</h1>
        <nav>
            <ol class="breadcrumb" style="user-select:none;">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Projects</li>
                <li class="breadcrumb-item active">New Project</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <form class="row g-3" id="addNewProject">
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>" class="form-control">
            <div class="col-md-12">
                <label for="name" class="form-label">Project Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-md-6">
                <?php if ($_SESSION['login_type'] == 1) { ?>
                    <label for="manager_id" class="form-label">Project Manager</label>
                    <select id="manager_id" class="form-select" name="manager_id">
                        <option selected>Select Manager</option>
                        <?php
                        $managers = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users where type = 2 order by concat(firstname,' ',lastname) asc ");
                        while ($row = $managers->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id'] ?>" <?php echo isset($manager_id) && $manager_id == $row['id'] ? "selected" : '' ?>><?php echo ucwords($row['name']) ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <input type="hidden" name="manager_id" class="form-control" value="<?php echo $_SESSION['login_id'] ?>">
                <?php } ?>
            </div>
            <div class="col-md-6">
                <label for="status" class="form-label">Project current Status</label>
                <select id="status" class="form-select" name="status">
                    <option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Pending</option>
                    <option value="3" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>On-Hold</option>
                    <option value="5" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Done</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="user_id" class="form-label">Project Team Members</label>
                <select id="user_id" class="form-select" multiple name="user_id">
                    <option selected>Select Team Members</option>
                    <?php
                    $employees = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users where type = 3 order by concat(firstname,' ',lastname) asc ");
                    while ($row = $employees->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id'] ?>" <?php echo isset($user_ids) && in_array($row['id'], explode(',', $user_ids)) ? "selected" : '' ?>><?php echo ucwords($row['name']) ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date">
            </div>
            <div class="col-md-6">
                <label for="expected_end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="expected_end_date" name="expected_end_date">
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="summernote form-control"></textarea>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-warning" onclick="location.href='index.php?page=list_of_project'">Cancel</button>
            </div>
        </form>
    </section>
</main>

<script>
    $('#addNewProject').submit(function(e) {
        e.preventDefault()
        $.ajax({
            url: 'ajax.php?action=save_project',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                console.log(resp);
                if (resp == 1) {
                    console.log('Data successfully saved');
                    setTimeout(function() {
                        location.reload();
                        location.href = 'index.php?page=list_of_project'
                    }, 2000)
                }else{
                    console.log('Data not successfully saved');
                }
            }
        })
    })
</script>