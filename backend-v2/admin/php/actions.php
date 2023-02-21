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

if($action == 'save_user'){
    $para="insert";
    $save_user = $task->user_save($para);
    if($save_user){
        echo $save_user;
    }
}

if($action == 'delete_user'){
    $delete_user = $task->user_delete();
    if($delete_user){
        echo $delete_user;
    }
}

if($action == 'save_employee'){
    $para="insert";
    $save_employee = $task->employee_add($para);
    if($save_employee){
        echo $save_employee;
    }
}

if($action == 'edit_employee'){
    $para="update";
    $save_employee = $task->employee_add($para);
    if($save_employee){
        echo $save_employee;
    }
}

if($action == 'delete_employee'){
    $delete_employee = $task->employee_delete();
    if($delete_employee){
        echo $delete_employee;
    }
}

if($action == 'save_client'){
    $para="insert";
    $save_client = $task->client_add($para);
    if($save_client){
        echo $save_client;
    }
}

if($action == 'edit_client'){
    $para="update";
    $edit_client = $task->client_add($para);
    if($edit_client){
        echo $edit_client;
    }
}

if($action == 'delete_client'){
    $para="insert";
    $delete_client = $task->client_delete();
    if($delete_client){
        echo $delete_client;
    }
}
