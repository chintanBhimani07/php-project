<?php
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];

include 'controller-class.php';

$task = new Controller();


// User 
if ($action == 'login_application_user') {
    $login = $task->login_application_user();
    if ($login) {
        echo $login;
    }
}
if ($action == 'save_user') {
    $para = "insert";
    $save_user = $task->user_save($para);
    if ($save_user) {
        echo $save_user;
    }
}
if ($action == 'delete_user') {
    $delete_user = $task->user_delete();
    if ($delete_user) {
        echo $delete_user;
    }
}
if ($action == 'change_password') {
    $change_password = $task->change_password();
    if ($change_password) {
        echo $change_password;
    }
}


// Employees
if ($action == 'save_employee') {
    $para = "insert";
    $save_employee = $task->employee_add($para);
    if ($save_employee) {
        echo $save_employee;
    }
}
if ($action == 'edit_employee') {
    $para = "update";
    $save_employee = $task->employee_add($para);
    if ($save_employee) {
        echo $save_employee;
    }
}
if ($action == 'delete_employee') {
    $delete_employee = $task->employee_delete();
    if ($delete_employee) {
        echo $delete_employee;
    }
}


// Clients
if ($action == 'save_client') {
    $para = "insert";
    $save_client = $task->client_add($para);
    if ($save_client) {
        echo $save_client;
    }
}
if ($action == 'edit_client') {
    $para = "update";
    $edit_client = $task->client_add($para);
    if ($edit_client) {
        echo $edit_client;
    }
}
if ($action == 'delete_client') {
    $delete_client = $task->client_delete();
    if ($delete_client) {
        echo $delete_client;
    }
}


//Expenses
if ($action == 'save_exp') {
    $para = "insert";
    $save_exp = $task->exp_add($para);
    if ($save_exp) {
        echo $save_exp;
    }
}
if ($action == 'edit_exp') {
    $para = "update";
    $edit_exp = $task->exp_add($para);
    if ($edit_exp) {
        echo $edit_exp;
    }
}
if ($action == 'delete_exp') {
    $para = "update";
    $delete_exp = $task->exp_delete();
    if ($delete_exp) {
        echo $delete_exp;
    }
}


// Projects
if ($action == 'save_project') {
    $para = "insert";
    $save_project = $task->project_add($para);
    if ($save_project) {
        echo $save_project;
    }
}
if ($action == 'edit_project') {
    $para = "update";
    $edit_project = $task->project_add($para);
    if ($edit_project) {
        echo $edit_project;
    }
}


// Task
if ($action == 'save_task') {
    $para = "insert";
    $save_task = $task->task_add($para);
    if ($save_task) {
        echo $save_task;
    }
}
if ($action == 'edit_task') {
    $para = "update";
    $edit_task = $task->task_add($para);
    if ($edit_task) {
        echo $edit_task;
    }
}
if ($action == 'delete_task') {
    $delete_task = $task->task_delete();
    if ($delete_task) {
        echo $delete_task;
    }
}


// Productivity
if($action == 'save_productivity'){
    $para = "insert";
    $save_productivity = $task->productivity_add($para);
    if ($save_productivity) {
        echo $save_productivity;
    }
}

if($action == 'edit_productivity'){
    $para = "update";
    $edit_productivity = $task->productivity_add($para);
    if ($edit_productivity) {
        echo $edit_productivity;
    }
}
