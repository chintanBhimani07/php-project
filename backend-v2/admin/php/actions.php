<?php
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];

include 'controller-class.php';

$task = new Controller();

if($action == 'login_application_user'){
    $login = $task->login_application_user();
    if($login){
        echo $login;
    }
}

if($action == 'save_employee'){
    $new_employee = $task->employee_add();
    if($new_employee){
        echo $new_employee;
    }
}

if($action == 'delete_employee'){
    $delete_employee = $task->employee_delete();
    if($delete_employee){
        echo $delete_employee;
    }
}

if($action == 'edit_employee'){
    $edit_employee = $task->employee_edit();
    if($edit_employee){
        echo $edit_employee;
    }
}



?>