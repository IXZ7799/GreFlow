<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login/login.php");
    exit;
}

$title = 'Admin Home';
ob_start();
include '../templates/admin_home.html.php';
$output = ob_get_clean();
include '../templates/admin_layout.html.php';
?>


