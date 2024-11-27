<?php
    session_start();   
    if (empty($_SESSION)) {
        header("Location: /adminLogin");
        exit(); 
    }
    if(isset($_SESSION['user_id'])){
        header("Location: /studentdashboard");
        exit();
    }
    $role = 'admin';
    $title = "SMS Admin Dashboard";
    require_once './views/admindashboard.view.php';