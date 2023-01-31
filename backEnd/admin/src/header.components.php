<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="d-flex align-items-center justify-content-between">
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" style="width:auto;" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">Company Management</span>
    </a>
  </div>
  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="assets/uploads/<?php echo $_SESSION['login_avatar']; ?>" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo ucwords($_SESSION['login_firstname']) ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?php echo ucwords($_SESSION['login_firstname']." ".$_SESSION['login_lastname']) ?></h6>
            <span>
              <?php if($_SESSION['login_type'] == 1){
                echo 'Administrator';
              }else if($_SESSION['login_type'] == 2){
                echo 'Employee';
              } else if ($_SESSION['login_type'] == 3) {
                echo 'Engineer';
              }?></span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="./index.php?page=user_profile"><span>My Profile</span></a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="./user-authentication/logOut.php"><span>Sing Out</span></a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</header>
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link" href="./" style="color:#000;background:none;">
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a style="color:#000;background:none;" class="nav-link collapsed" data-bs-target="#project-nav" data-bs-toggle="collapse" href="#">
        <span>Projects</span>
      </a>
      <ul id="project-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="./index.php?page=project_status">
            <span>Project Status</span>
          </a>
        </li>
        <li>
          <a href="./index.php?page=add_project">
            <span>Add Project</span>
          </a>
        </li>
        <li>
          <a href="./index.php?page=list_of_project">
            <span>List of Projects</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a style="color:#000;background:none;" class="nav-link collapsed" data-bs-target="#emp-nav" data-bs-toggle="collapse" href="#">
        <span>Employees</span>
      </a>
      <ul id="emp-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="./index.php?page=empList">
            <span>All Employees</span>
          </a>
        </li>
        <li>
          <a href="./index.php?page=add_employee">
            <span>New Employees</span>
          </a>
        </li>
        <li class="nav-item">
          <a style="color:#000;background:none;" class="nav-link collapsed" data-bs-target="#app-nav" data-bs-toggle="collapse" href="#">
            <span>Application</span>
          </a>
          <ul id="app-nav" class="nav-content collapse " data-bs-parent="#emp-nav">
            <li>
              <a href="./index.php?page=userList" style="padding-left:65px;">
                <span>All Users</span>
              </a>
            </li>
            <li>
              <a href="./index.php?page=add_user" style="padding-left:65px;">
                <span>New User</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="./index.php?page=list_of_project">
            <span></span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</aside>