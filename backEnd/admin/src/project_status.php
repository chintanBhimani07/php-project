<?php
include '../config/db.config.php';

$twhere = "";
if ($_SESSION['login_type'] != 1) {
  $twhere = "  ";
}

$where = "";
if ($_SESSION['login_type'] == 2) {
  $where = " where manager_id = '{$_SESSION['login_id']}' ";
} elseif ($_SESSION['login_type'] == 3) {
  $where = " where concat('[',REPLACE(user_ids,',','],['),']') LIKE '%[{$_SESSION['login_id']}]%' ";
}
$where2 = "";
if ($_SESSION['login_type'] == 2) {
  $where2 = " where p.manager_id = '{$_SESSION['login_id']}' ";
} elseif ($_SESSION['login_type'] == 3) {
  $where2 = " where concat('[',REPLACE(p.user_ids,',','],['),']') LIKE '%[{$_SESSION['login_id']}]%' ";
}
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Project Status</h1>
    <nav>
      <ol class="breadcrumb" style="user-select:none;">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Projects</li>
        <li class="breadcrumb-item active">Project Status</li>
      </ol>
    </nav>
  </div>
  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-xxl-6 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Total Projects</h5>
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-center justify-content-center">
                    <img src="../assets/img/totalWork.png" alt="" srcset="">
                  </div>
                  <div class="ps-3">
                    <h6><?php echo $conn->query("SELECT * FROM projects $where")->num_rows; ?></h6>
                    <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-6 col-xl-12">
            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Total Assigned Task</h5>
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-center justify-content-center">
                    <img src="../assets/img/pendingWork.png" alt="" srcset="">
                  </div>
                  <div class="ps-3">
                    <h6><?php echo $conn->query("SELECT t.*,p.name as pname,p.start_date,p.status as pstatus, p.expected_end_date,p.id as pid FROM task_list t inner join projects p on p.id = t.project_id $where2")->num_rows; ?></h6>
                    <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">Project Status</h5>
                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Project</th>
                      <th scope="col">Progress</th>
                      <th scope="col">Status</th>
                      <th scope="col">View</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $stat = array("Pending", "Started", "On-Progress", "On-Hold", "Over Due", "Done");
                    $where = "";
                    if ($_SESSION['login_type'] == 2) {
                      $where = " where manager_id = '{$_SESSION['login_id']}' ";
                    } elseif ($_SESSION['login_type'] == 3) {
                      $where = " where concat('[',REPLACE(user_ids,',','],['),']') LIKE '%[{$_SESSION['login_id']}]%' ";
                    }
                    $qry = $conn->query("SELECT * FROM projects $where order by name asc");
                    while ($row = $qry->fetch_assoc()) {
                      $prog = 0;
                      $tprog = $conn->query("SELECT * FROM task_list where project_id = {$row['id']}")->num_rows;
                      $cprog = $conn->query("SELECT * FROM task_list where project_id = {$row['id']} and status = 3")->num_rows;
                      $prog = $tprog > 0 ? ($cprog / $tprog) * 100 : 0;
                      $prog = $prog > 0 ?  number_format($prog, 2) : $prog;
                      $prod = $conn->query("SELECT * FROM user_productivity where project_id = {$row['id']}")->num_rows;
                      if ($row['status'] == 0 && strtotime(date('Y-m-d')) >= strtotime($row['start_date'])) {
                        if ($prod  > 0  || $cprog > 0) {
                          $row['status'] = 2;
                        } else {
                          $row['status'] = 1;
                        }
                      } elseif ($row['status'] == 0 && strtotime(date('Y-m-d')) > strtotime($row['end_date'])) {
                        $row['status'] = 4;
                      }
                    ?>
                      <tr>
                        <td>
                          <?php echo $i++ ?>
                        </td>
                        <td>
                          <?php echo ucwords($row['name']) ?>

                          <br>
                          <small>
                            Due: <?php echo date("Y-m-d", strtotime($row['expected_end_date'])) ?>
                          </small>
                        </td>
                        <td class="project_progress">
                          <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $prog ?>%">
                            </div>
                          </div>
                          <small>
                            <?php echo $prog ?>% Complete
                          </small>
                        </td>
                        <td>
                          <?php
                          if ($stat[$row['status']] == 'Pending') {
                            echo "<span class='badge badge-secondary text-dark'>{$stat[$row['status']]}</span>";
                          } elseif ($stat[$row['status']] == 'Started') {
                            echo "<span class='badge badge-primary text-dark'>{$stat[$row['status']]}</span>";
                          } elseif ($stat[$row['status']] == 'On-Progress') {
                            echo "<span class='badge badge-info text-dark'>{$stat[$row['status']]}</span>";
                          } elseif ($stat[$row['status']] == 'On-Hold') {
                            echo "<span class='badge badge-warning text-dark'>{$stat[$row['status']]}</span>";
                          } elseif ($stat[$row['status']] == 'Over Due') {
                            echo "<span class='badge badge-danger text-dark'>{$stat[$row['status']]}</span>";
                          } elseif ($stat[$row['status']] == 'Done') {
                            echo "<span class='badge badge-success text-dark'>{$stat[$row['status']]}</span>";
                          }
                          ?>
                        </td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="./index.php?page=view_project&id=<?php echo $row['id'] ?>">
                            View
                          </a>
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
  </section>
</main>