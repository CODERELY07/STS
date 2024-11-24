<?php
    session_start();   
    if (empty($_SESSION)) {
        header("Location: /adminLogin");
        exit(); 
    }
    $role = 'admin';
    require_once './views/admininstructors.view.php';