<?php
include '../config/db.config.php';
$stat = array("Pending", "Started", "On-Progress", "On-Hold", "Over Due", "Done");
$qry = $conn->query("SELECT * FROM projects where id = " . $_GET['id'])->fetch_array();
foreach ($qry as $k => $v) {
    $$k = $v;
}
$tprog = $conn->query("SELECT * FROM task_list where project_id = {$id}")->num_rows;
$cprog = $conn->query("SELECT * FROM task_list where project_id = {$id} and status = 3")->num_rows;
$prog = $tprog > 0 ? ($cprog / $tprog) * 100 : 0;
$prog = $prog > 0 ?  number_format($prog, 2) : $prog;
$prod = $conn->query("SELECT * FROM user_productivity where project_id = {$id}")->num_rows;
if ($status == 0 && strtotime(date('Y-m-d')) >= strtotime($start_date)) :
    if ($prod  > 0  || $cprog > 0)
        $status = 2;
    else
        $status = 1;
elseif ($status == 0 && strtotime(date('Y-m-d')) > strtotime($expected_end_date)) :
    $status = 4;
endif;
$manager = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users where id = $manager_id");
$manager = $manager->num_rows > 0 ? $manager->fetch_array() : array();
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>View Project</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Project</li>
                <li class="breadcrumb-item"><a href="./index.php?page=project_status">Project Status</a></li>
                <li class="breadcrumb-item active">View Project</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header"><?php echo ucwords($name) ?></div>
                    <div class="card-body">
                        <div>
                            <h5 class="card-title float-none">Description: </h5>
                            <p class="card-text"><?php echo html_entity_decode($description) ?></p>
                        </div>
                        <div>
                            <h5 class="card-title me-2">Start Date: </h5>
                            <span class="card-text"></span><?php echo date("F d, Y", strtotime($start_date)) ?></span>
                        </div>
                        <div>
                            <h5 class="card-title me-2">End Date: </h5>
                            <span class="card-text"><?php echo date("F d, Y", strtotime($expected_end_date)) ?></span>
                        </div>
                        <div>
                            <h5 class="card-title me-2">Status: </h5>
                            <?php
                            if ($stat[$status] == 'Pending') { ?>
                                <span class='badge bg-warning text-dark'><?php echo $stat[$status]; ?></span>
                            <?php } elseif ($stat[$status] == 'Started') { ?>
                                <span class='badge bg-secondary'><?php echo $stat[$status]; ?></span>
                            <?php } elseif ($stat[$status] == 'On-Progress') { ?>
                                <span class='badge bg-info text-dark'><?php echo $stat[$status]; ?></span>
                            <?php } elseif ($stat[$status] == 'On-Hold') { ?>
                                <span class='badge bg-info text-dark'><?php echo $stat[$status]; ?></span>
                            <?php } elseif ($stat[$status] == 'Over Due') { ?>
                                <span class='badge bg-danger'><?php echo $stat[$status]; ?></span>
                            <?php } elseif ($stat[$status] == 'Done') { ?>
                                <span class='badge bg-success'><?php echo $stat[$status]; ?></span>
                            <?php } ?>
                        </div>
                        <div>
                            <h5 class="card-title float-none">Project Manager</h5>
                            <div>
                                <?php if (isset($manager['id'])) { ?>
                                    <img class="rounded-circle img-thumbnail p-0 shadow-sm border-info img-sm mr-3" src="assets/uploads/<?php echo $manager['avatar'] ?>" alt="Avatar" width="30px" height="30px">
                                    <p class="card-text"><?php echo ucwords($manager['name']) ?> </p>

                                <?php } else { ?>
                                    <p class="card-text">Manager Deleted from Database</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Team Member/s:</h5>
                        <div class="users-list clearfix">
                            <?php
                            if (!empty($user_id)) {
                                $members = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users where id in ($user_id) order by concat(firstname,' ',lastname) asc");
                                while ($row = $members->fetch_assoc()) {
                            ?>
                                    <div>
                                        <img src="./assets/uploads/<?php echo $row['avatar'] ?>" alt="User Image" width="75px" height="75px" class="rounded-circle">
                                        <span><?php echo ucwords($row['name']) ?></span>
                                    </div>
                                <?php
                                }
                            } else { ?>
                                <h1>Today</h1>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title d-inline-block">Task List</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTask">
                            New Task
                        </button>
                        <table class="table datatable">
                            <colgroup>
                                <col width="10%">
                                <col width="25%">
                                <col width="50%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Task</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $tasks = $conn->query("SELECT * FROM task_list where project_id = {$id} order by task asc");
                                while ($row = $tasks->fetch_assoc()) {
                                    $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
                                    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                                    $desc = strtr(html_entity_decode($row['description']), $trans);
                                    $desc = str_replace(array("<li>", "</li>"), array("", ", "), $desc);
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++ ?></td>
                                        <td class=""><b><?php echo ucwords($row['task']) ?></b></td>
                                        <td class="">
                                            <p class="truncate"><?php echo strip_tags($desc) ?></p>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['status'] == 1) { ?>
                                                <span class='badge bg-info text-dark'>Pending</span>
                                            <?php } elseif ($row['status'] == 2) { ?>
                                                <span class='badge bg-info text-dark'>On Progress</span>
                                            <?php } elseif ($row['status'] == 3) { ?>
                                                <span class='badge bg-success'>Done</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Modal -->
<div class="modal fade" id="addTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">New Task For <?php echo ucwords($name) ?></h1>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="" id="newTask">
                    <div class="col-12">
                        <input type="hidden" name="project_id" class="form-control" value="<?php echo isset($id) ? $id : '' ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="task" class="form-label">Task</label>
                        <input type="text" class="form-control" id="task" name="task" required>
                    </div>
                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea rows="10" cols="10" class="form-control" name="description"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="=status" class="form-label">Status</label>
                        <select id="status" class="form-select" name="status">
                            <option value="1">Pending</option>
                            <option value="2">On-Progress</option>
                            <option value="3">Done</option>
                        </select>
                    </div>
                    <div class="col-12"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Understood</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $('#newTask').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'ajax.php?action=save_task',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                if (resp == 1) {
                    console.log('Data successfully saved', "success");
                    setTimeout(function() {
                        location.reload()
                    }, 1500)
                }
            }
        })
    });
</script>