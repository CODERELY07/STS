<?php
    session_start();   
    if (empty($_SESSION)) {
        header("Location: /adminLogin");
        exit(); 
    }
    require_once './views/admininstructors.view.php';