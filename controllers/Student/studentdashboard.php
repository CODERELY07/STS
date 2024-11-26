<?php
    // session_start();   
    // if (empty($_SESSION)) {
    //     header("Location: /adminLogin");
    //     exit(); 
    // }
    session_start();
    if (empty($_SESSION)) {
        header("Location: /login");
        exit(); 
    }
    if(isset($_SESSION['adminIsLoggin']) && $_SESSION['adminIsLoggin'] == true) {
        header("Location: /admindashboard");
    }
   
    $role = 'student';

    // $sql = "SELECT * FROM courses WHERE  "
    require_once './views/studentdashboard.view.php';