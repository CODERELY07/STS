<?php

    $host = 'localhost';
    $db = 'student_management_system';
    $user = 'root';
    $password = 'nonoy12345';

    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($pdo){
            // echo "Connect to the $db database successfully!";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }


?>