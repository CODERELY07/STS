<?php
    
    require_once(__DIR__ . '/../../paths.php');
    require CONFIG_PATH . 'config.php';

    function createAdmin($username, $password){
        global $pdo;
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, password) VALUES(:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password_hash);

        try{
            $stmt->execute();
            echo "User Added Successfully";
        }catch(PDOException $e){
            echo "Error Inserting user: " . $e->getMessage();
        }
    }

    $username = "admin";
    $password = "password";

    createAdmin($username, $password);
    

?>