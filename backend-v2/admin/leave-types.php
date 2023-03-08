<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Leaves Types</h1>
        <a href="./index.php?page=leaveType-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add Leave Type</a>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Leaves Type </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Leave Type</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = $con->query("SELECT * FROM  leavestype;");
                                $i = 1;
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><?php echo $row['leave_type'] ?></td>
                                        <td><?php echo $row['leave_description'] ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a type="button" class="btn btn-warning  btn-circle mx-1" href="./index.php?page=leaveType-edit&typeId=<?php echo $row['leave_type_id'] ?>"><i class="fa-solid fa-user-pen"></i></a>
                                            <a type="button" class="deleteEmployee btn btn-danger btn-circle mx-1" href="javascript:void(0)" data-id="<?php echo $row['leave_type_id'] ?>"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.deleteEmployee').click(function() {
            console.log('click');
            let id = $(this).data('id');
            $.ajax({
                url: './php/actions.php?action=delete_employee',
                method: 'POST',
                data: {
                    emp_id: id
                },
                success: function(resp) {
                    console.log(resp);
                    if (resp == 1) {
                        setTimeout(function() {
                            location.reload()
                        }, 1000);
                    } else {
                        console.log(resp);
                    }
                },
                error: function(resp) {
                    console.log(resp);
                }
            });
        });
    });
</script>