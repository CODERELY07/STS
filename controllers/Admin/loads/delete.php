<?php

    require_once(__DIR__ . '/../../../paths.php');
    require CONFIG_PATH . 'config.php'; 
    
    if(isset($_POST['id'])){
        $id = trim($_POST['id']);
        try{
            $sql_userID = "SELECT UserID from instructors WHERE InstructorID = :id";
            $stmt_userID = $pdo->prepare($sql_userID); 
            $stmt_userID->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt_userID->execute();
            $userID = $stmt_userID->fetchColumn();

            
            $sql = "DELETE FROM instructors WHERE InstructorID = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if($stmt->execute()){
                
                $sql_user = "DELETE FROM users WHERE userID = :userID";
                $stmt_user = $pdo->prepare($sql_user);
                $stmt_user->bindParam(":userID", $userID);
                if($stmt_user->execute()){  
                    echo "Deleted Successfully!";
                } else {
                    echo "Failed to delete user!";
                }
            }else{
                echo "Can't Delete, something's wrong!";
            }
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
