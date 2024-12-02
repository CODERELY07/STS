<?php
    // Start session
    session_start();

    // Redirect if session is empty (user not logged in)
    if (empty($_SESSION)) {
        header("Location: /login");
        exit(); 
    }

    // Set role to student
    $role = 'student';

    // Include configuration
    require_once 'config/config.php';

    // Get user ID from session
    $userID = $_SESSION['user_id'];

    // Fetch student details from database
    $sql = "SELECT * FROM students WHERE userID = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fetch user details from users table
    $sql_users = "SELECT * FROM users WHERE userID = :userID";
    $users_stmt = $pdo->prepare($sql_users);
    $users_stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $users_stmt->execute();
    $user = $users_stmt->fetch(PDO::FETCH_ASSOC);

    // Set page title
    $title = "SMS Student Edit Profile";

    // Include the edit profile view
    require_once './views/editProfile.view.php';
?>
