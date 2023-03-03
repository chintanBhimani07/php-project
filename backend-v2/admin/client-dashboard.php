<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Clients</h1>
        <a href="./index.php?page=client-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add Client</a>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card-12 shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Client List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $qry = $con->query("SELECT * FROM  clients;");
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i++ ?>
                                        </th>
                                        <td>
                                            <?php echo $row['client_first_name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['client_last_name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['client_email'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['client_address'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['client_contact'] ?>
                                        </td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a type="button" class="btn btn-warning  btn-circle mx-1" href="./index.php?page=client-edit&clientId=<?php echo $row['client_id'] ?>"><i class="fa-solid fa-user-pen"></i></a>
                                            <a type="button" class="btn btn-danger  btn-circle deleteClient mx-1" href="#" data-id="<?php echo $row['client_id'] ?>"><i class="fa-solid fa-trash"></i></a>
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


    <script>
        $(document).ready(function() {
            $('.deleteClient').click(function() {
                console.log('click');
                let id = $(this).attr('id');
                $.ajax({
                    url: './php/actions.php?action=delete_client',
                    method: 'POST',
                    data: {
                        client_id: id
                    },
                    success: function(resp) {
                        console.log(resp);
                        if (resp == 1) {
                            setTimeout(function() {
                                location.reload();
                            }, 1000)

                        } else {
                            console.log(resp);
                        }
                    },
                    error:function(resp){
                        console.log(resp);
                    }
                });
            });
        });
    </script>