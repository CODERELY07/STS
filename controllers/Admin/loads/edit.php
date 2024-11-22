<?php

    require_once(__DIR__ . '/../../../paths.php');
    require CONFIG_PATH . 'config.php'; 
    if(isset($_POST['id'])){
        $id = trim($_POST['id']);
        $text = trim($_POST['text']);
        $columnname = trim($_POST['columnname']);

        $allowed = ['FirstName', 'LastName', 'MiddleName', 'Email', 'Phone'];
        if(in_array($columnname, $allowed)){
            try{
                $sql = "UPDATE instructors SET $columnname = :text WHERE InstructorID = :id";
                $stmt = $pdo->prepare($sql);
    
                if($stmt->execute([':text' => $text, ':id' => $id])){
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