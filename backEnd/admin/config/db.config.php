<?php

$host="localhost";
$username="root";
$password="";
$database="project-v1";

$conn = new mysqli($host,$username,$password,$database)or die("Could not connect to mysql".mysqli_error($conn));

if ($conn != true) {
    mysqli_close($conn);
}
?>