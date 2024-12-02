<?php

      //admindashboard to view student for students modification and etc. 
    session_start();   
    if (empty($_SESSION)) {
        header("Location: /adminLogin");
        exit(); 
    }
    $role = 'admin';
    $title = "SMS Admin";
    require_once './views/adminstudent.view.php';