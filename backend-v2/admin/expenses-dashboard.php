<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Expenses</h1>
        <a href="./index.php?page=expenses-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add Expenses</a>
    </div>
    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Amount Of Expenses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                echo $con->query("SELECT * FROM expenses;")->num_rows;
                                                                                ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Conformed</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                // echo $con->query("SELECT * FROM expenses WHERE emp_confirmation_date <> '0000-00-00';")->num_rows . ' ' . 'Expenses';
                                                                                ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Exp. Name</th>
                                    <th>Exp. Amount</th>
                                    <th>Exp. Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $qry = $con->query("SELECT * FROM  expenses;");
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++ ?></th>
                                        <td><?php echo $row['exp_name'] ?></td>
                                        <td><?php echo $row['exp_amount'] ?> <i class="fa-solid fa-indian-rupee-sign"></i></td>
                                        <td><?php echo $row['exp_date'] ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a type="button" class="btn btn-warning  btn-circle editEmployee mx-1" href="./index.php?page=expenses-edit&expId=<?php echo $row['exp_id'] ?>"><i class="fa-solid fa-user-pen"></i></a>
                                            <a type="button" class="btn btn-danger  btn-circle  mx-1" href="#" data-toggle="modal" data-target="#deleteEmployeeModal"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                                    <button class="btn btn-danger deleteExp" data-dismiss="modal" id="<?php echo $row['exp_id'] ?>">Delete</button>
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
</div>


<script>
    $(document).ready(function() {
        $('.deleteExp').click(function() {
            let id = $(this).attr('id');
            $.ajax({
                url: './php/actions.php?action=delete_exp',
                method: 'POST',
                data: {
                    exp_id: id
                },
                success: function(resp) {
                    if (resp == 1) {
                        setTimeout(function() {
                            location.reload()
                        }, 1000);
                    } else {
                        console.log(resp);
                    }
                }
            });
        });
    });
</script>