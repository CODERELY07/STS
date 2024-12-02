<?php
    // Start a session to manage user authentication
    session_start();

    // Check if the user is already logged in (session variable 'user_id' exists)
    // If so, redirect to the student dashboard
    if(isset($_SESSION['user_id'])){
        header("Location: /studentdashboard");
        exit();
    }

    // Set the title of the page and a flag for login functionality
    $title = "SMS Login";
    $login = true;

    // Include the login view to display the login page
    require_once 'views/login.view.php';
?>
