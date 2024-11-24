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
    require_once './views/editProfile.view.php';