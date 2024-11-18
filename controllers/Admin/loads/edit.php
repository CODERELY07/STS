<?php

require_once(__DIR__ . '/../../paths.php');
require CONFIG_PATH . 'config.php';
   
    if(isset($_POST['id'])){
        $id = trim($_POST['id']);
        $username = trim($_POST['text']);
        $columnname = trim($_POST['columnname']);

        $allowed = ['username'];
        if(in_array($columnname, $allowed)){
            try{
                $sql = "UPDATE users SET $columnname = :username WHERE id = :id";
                $stmt = $pdo->prepare($sql);
    
                if($stmt->execute([':username' => $username, ':id' => $id])){
                    echo "Edit Successfully";
                }else{
                    echo "Can't Edit something's wrong!";
                }
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }else{
            echo "Column is not allowed";
        }
       
    }