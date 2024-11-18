<?php

    require_once(__DIR__ . '/../../paths.php');
    require CONFIG_PATH . 'config.php';
    
    if(isset($_POST['id'])){
        $id = trim($_POST['id']);
        try{
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if($stmt->execute()){
                echo "Delete Successfully";
            }else{
                echo "Can't Delete something's wrong!";
            }
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
       
    }