<!DOCTYPE html>
<html lang="en">
<?php
include '../config/db.config.php';

session_start();
if (!isset($_SESSION['login_id'])) {
  header('location:login.php');
}
include './head.components.php'
?>

<body>
  <?php
  include './header.components.php';
  $page = (isset($_GET['page']) ? $_GET['page'] : 'home');
  if (!file_exists($page . ".php")) {
    include '404.html';
  } else {
    include $page . '.php';
  }

  include './footer.components.php'
  ?>
</body>

</html>