<?php
    // Start session
    session_start();

    // Redirect if user is logged in
    if(isset($_SESSION['user_id'])){
        header("Location: /studentdashboard");
        exit();
    }

    // Include the registered view
    require_once 'views/registered.view.php';
?>
