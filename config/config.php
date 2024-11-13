<?php

    $host = 'localhost';
    $db = 'student_management_system';
    $user = 'root';
    $password = 'nonoy12345';

    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

    try {
        $pdo = new PDO($dsn, $user, $password);
        if($pdo){
            // echo "Connect to the $db database successfully!";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }


?>