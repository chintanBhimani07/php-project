<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Projects Report</h1>
        <a href="./index.php?page=project-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>All Projects</a>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Project List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5%">Sr No.</th>
                                    <th width="20%">Project</th>
                                    <th width="5%">Total Task</th>
                                    <th width="5%">Completed Task</th>
                                    <th width="5%">Work Duration</th>
                                    <th width="50%">Progress</th>
                                    <th width="10%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $qry = $con->query("SELECT * FROM  projects ORDER BY project_name;");
                                while ($row = $qry->fetch_assoc()) {
                                    $projectId = $row['project_id'];
                                    $totalTask = $con->query("SELECT * FROM task where project_id='$projectId'")->num_rows;
                                    $completeTask = $con->query("SELECT * FROM task where project_id ='$projectId' and task_status = 3")->num_rows;
                                    $progress = $totalTask > 0 ? ($completeTask / $totalTask) * 100 : 0;
                                    $progress = $progress > 0 ? number_format($progress, 2) : $progress;
                                    $productivity = $con->query("SELECT * FROM productivity WHERE project_id='$projectId'")->num_rows;
                                    $duration = $con->query("SELECT sum(time_rendered) as duration FROM productivity WHERE project_id='$projectId'");
                                    $duration = $duration->num_rows > 0 ? $duration->fetch_assoc()['duration'] : 0;
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i++ ?>
                                        </th>
                                        <td>
                                            <?php echo $row['project_name'] ?>
                                            <small class="d-block text-danger">
                                                Due: <?php echo date("Y-m-d", strtotime($row['expected_end_date'])) ?>
                                            </small>
                                        </td>
                                        <td><?php echo number_format($totalTask) ?></td>
                                        <td><?php echo number_format($completeTask) ?></td>
                                        <td><?php echo number_format($duration) . ' Hr/s.' ?></td>

                                        <td class="px-5">
                                            <h4 class="small font-weight-bold">Complete<span class="float-right"><?php echo $progress?>%</span></h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $progress ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $row['project_status'] ?>
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
        $('.deleteProject').click(function() {
            // console.log('click');
            let id = $(this).attr('id');
            $.ajax({
                url: './php/actions.php?action=delete_project',
                method: 'POST',
                data: {
                    project_id: id
                },
                success: function(resp) {
                    if (resp == 1) {
                        setTimeout(function() {
                            location.reload()
                        }, 1000)

                    } else {
                        console.log(resp);
                    }
                }
            });
        });
    });
</script>