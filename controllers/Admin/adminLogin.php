<?php

session_start();
if (isset($_SESSION['userType']) && $_SESSION['userType'] == 'admin') {
    header("Location: /admindashboard");
    exit(); 
}

if(isset($_SESSION['user_id'])){
    header("Location: /studentdashboard");
    exit();
}
require_once './views/adminLogin.view.php'; 
