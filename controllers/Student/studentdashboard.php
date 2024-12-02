<?php
    // Start session
    session_start();

    // Redirect if session is empty (user not logged in)
    if (empty($_SESSION)) {
        header("Location: /login");
        exit(); 
    }

    // Redirect if admin is logged in
    if(isset($_SESSION['adminIsLoggin']) && $_SESSION['adminIsLoggin'] == true) {
        header("Location: /admindashboard");
        exit();
    }

    // Set role to student
    $role = 'student';

    // Set page title
    $title = "SMS Student Dashboard";

    // Include the student dashboard view
    require_once './views/studentdashboard.view.php';
?>
