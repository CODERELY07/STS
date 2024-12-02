<?php

    //this code create admin username name and password encrypted
    session_start();
    if (isset($_SESSION['userType']) && $_SESSION['userType'] == 'admin') {
        header("Location: /admindashboard");
        exit(); 
    }

    function createAdmin($username, $adminpassword){
        require_once(__DIR__ . '/../../paths.php');
        require CONFIG_PATH . 'config.php';

        $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        $password_hash = password_hash($adminpassword, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, password) VALUES(:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password_hash);

        try{
            $stmt->execute();
            echo "User Added Successfully";
        }catch(PDOException $e){
            echo "Error Inserting user: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        }
    }

    $username = "admin";
    $adminpassword = "password";

    createAdmin($username, $adminpassword);
    

?>