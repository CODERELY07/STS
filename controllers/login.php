<?php
session_start();
if(isset($_SESSION['user_id'])){
    header("Location: /studentdashboard");
    exit();
}
$login = true;

require_once 'views/login.view.php';
    