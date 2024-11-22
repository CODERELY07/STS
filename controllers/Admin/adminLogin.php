<?php

session_start();
if (isset($_SESSION['userType']) && $_SESSION['userType'] == 'admin') {
    header("Location: /admindashboard");
    exit(); 
}
require_once './views/adminLogin.view.php'; 
