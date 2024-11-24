<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        header("Location: /studentdashboard");
        exit();
    }
    require_once 'views/registered.view.php';
    