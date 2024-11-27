<?php
    session_start();
    if (empty($_SESSION)) {
        header("Location: /login");
        exit(); 
    }

    $role = 'student';
    require_once 'config/config.php';
    $userID = $_SESSION['user_id'];
    $sql = "SELECT * FROM students WHERE userID = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userID',$userID, PDO::PARAM_INT);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql_users = "SELECT * FROM users WHERE userID = :userID";
    $users_stmt = $pdo->prepare($sql_users);
    $users_stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $users_stmt->execute();
    $user = $users_stmt->fetch(PDO::FETCH_ASSOC);
    
    $title = "SMS Student Edit Profile";
    require_once './views/editProfile.view.php';