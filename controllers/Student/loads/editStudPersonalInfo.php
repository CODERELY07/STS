<?php

    session_start();
    require_once(__DIR__ . '/../../../paths.php');
    require CONFIG_PATH . 'config.php';

    if(isset($_POST['firstname']) && $_SERVER["REQUEST_METHOD"] == "POST"){

        $data = $_POST; 
        $setClause = [];
        $params = [];

        foreach ($data as $column => $value) {
            $value = (empty($value) && $value !== '0') ? NULL : $value;
            $setClause[] = "$column = :$column";
            $params[":$column"] = $value;
        }

        $setClauseString = implode(", ", $setClause);

        $student_id = $_SESSION['user_id'];


        $sql = "UPDATE students SET $setClauseString WHERE userID = :student_id";


        $stmt = $pdo->prepare($sql);
        $params[':student_id'] = $student_id;

        try {
            $stmt->execute($params);
            echo "Record updated successfully.";
            header("Location: /editProfile");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    if(isset($_POST['formerschoolname']) && $_SERVER["REQUEST_METHOD"] == "POST"){

        $data = $_POST; 
        $setClause = [];
        $params = [];

        foreach ($data as $column => $value) {
            $value = (empty($value) && $value !== '0') ? NULL : $value;
            $setClause[] = "$column = :$column";
            $params[":$column"] = $value;
        }

        $setClauseString = implode(", ", $setClause);

        $student_id = $_SESSION['user_id'];


        $sql = "UPDATE students SET $setClauseString WHERE userID = :student_id";


        $stmt = $pdo->prepare($sql);
        $params[':student_id'] = $student_id;

        try {
            $stmt->execute($params);
            echo "Record updated successfully.";
            header("Location: /editProfile");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['newPassword']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $newPassword = $_POST['newPassword'];
        $student_id = $_SESSION['user_id'];
       
        
        $sql = "SELECT password FROM users WHERE userID = :student_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':student_id' => $student_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
           
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    
          
            $sql = "UPDATE users SET username = :username, password = :password WHERE userID = :student_id";
            $stmt = $pdo->prepare($sql);
    
            // Bind the parameters
            $params = [
                ':username' => $username,
                ':password' => $hashedPassword,
                ':student_id' => $student_id
            ];
    
            try {
                $stmt->execute($params);
                echo "Record updated successfully.";
                header("Location: /editProfile");
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Incorrect password.";
        }
    }
    


?>
