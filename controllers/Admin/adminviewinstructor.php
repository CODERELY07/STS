<?php

    //admindashboard to view instructor for instuctors data modification and to add 
    session_start();   
    if (empty($_SESSION)) {
        header("Location: /adminLogin");
        exit(); 
    }
    $role = 'admin';
    $title = "SMS Admin";
    require_once './views/admininstructors.view.php';