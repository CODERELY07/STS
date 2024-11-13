<?php
    
    include_once('paths.php');

    session_start();
    if(isset($_SESSION['registerd']) && $_SESSION['registered'] == TRUE){
        header("Location: views/registered.view.php");
    }
    require_once PARTIALS_PATH . 'readCsv.php';
    require_once VIEW_PATH . 'register.view.php';
    