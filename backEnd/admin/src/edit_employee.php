<?php
include '../config/db.config.php';
$qry = $conn->query("SELECT * FROM employees Where emp_id=".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}

include './add_employee.php';
?>