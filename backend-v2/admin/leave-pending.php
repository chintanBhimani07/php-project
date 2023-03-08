<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pending Leaves</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pending Leaves</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Employee Name</th>
                                    <th>Leave Type</th>
                                    <th>Applied On</th>
                                    <th>Current Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = $con->query("SELECT * FROM leaves WHERE leave_status=0;");
                                $i = 1;
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><?php
                                            $userId = $row['user_id'];
                                            $user = $con->query("SELECT * FROM users WHERE user_id='$userId'");
                                            while ($r = $user->fetch_assoc()) {
                                                echo $r['user_first_name'] . " " . $r['user_last_name'];
                                            }
                                            ?></td>
                                        <td><?php
                                            $typeId = $row['leave_type'];
                                            $leaveType = $con->query("SELECT * FROM leavestype WHERE leave_type_id ='$typeId'");
                                            while ($r = $leaveType->fetch_assoc()) {
                                                echo $r['leave_type'];
                                            }
                                            ?></td>
                                        <td><?php
                                            if ($row['posting_date'] == '0000-00-00') {
                                                echo "";
                                            } else {
                                                echo $row['posting_date'];
                                            }
                                            ?></td>
                                        <td><?php
                                            if ($row['leave_status'] == 0) { ?>
                                                <span style="color: blue">Pending</span>
                                            <?php } else if ($row['leave_status'] == 1) { ?>
                                                <span style="color: red">Decline</span>
                                            <?php } else { ?>
                                                <span style="color: green">Approved</span>
                                            <?php } ?>
                                        </td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a type="button" class="btn btn-primary btn-circle mx-1" href="./index.php?page=leave-viewer&leaveId=<?php echo $row['leave_id'] ?>"><i class="fa-solid fa-eye"></i></a>
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