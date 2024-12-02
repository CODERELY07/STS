<?php

    // Start a session to manage user authentication
    session_start();

    // Check if the logged-in user is an admin and redirect to the admin dashboard
    if (isset($_SESSION['userType']) && $_SESSION['userType'] == 'admin') {
        header("Location: /admindashboard");
        exit(); 
    }

    // Check if the logged-in user is a student and redirect to the student dashboard
    if(isset($_SESSION['user_id'])){
        header("Location: /studentdashboard");
        exit();
    }

    // Include the main view page for the index
    require_once './views/index.view.php';
?>
