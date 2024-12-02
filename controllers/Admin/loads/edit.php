<?php
    //updates specific fields (FirstName, LastName, MiddleName, Email, or Phone) of an instructor's record based on the provided ID and field name.

    require_once(__DIR__ . '/../../../paths.php');
    require CONFIG_PATH . 'config.php'; 
    if(isset($_POST['id'])){
        $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
        $text = htmlspecialchars(trim($_POST['text']), ENT_QUOTES, 'UTF-8');
        $columnname = htmlspecialchars(trim($_POST['columnname']), ENT_QUOTES, 'UTF-8');

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
                echo "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
            }
        }else{
            echo "Column is not allowed";
        }
       
    }