<?php
    
    require 'config/config.php';
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['userType']) && isset($_POST['formData'])) {
            parse_str($_POST['formData'], $formData); 
            if ($_POST['userType'] == 'admin') {
                
                $username = $formData['admin-username'];
                $password = $formData['admin-password'];

                $sql = "SELECT username, password FROM users WHERE username = :username";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->execute();

                if($stmt->rowCount() > 0){
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    if(password_verify($password, $user['password'])){
                        echo json_encode(['isSuccess' => true, 'message' => "Admin Login Successful"]);
                    }else{
                        echo json_encode(['isSuccess' => false, 'message' =>  "Invalid Password"]);
                    }
                }else{
                    echo json_encode(['isSuccess' => false, 'message' =>  "No User Found"]);
                }
                
            } elseif ($_POST['userType'] == 'instructor') {
                // Instructor login handling logic
                $instructorId = $formData['instructor-id'];
                $instructorPassword = $formData['instructor-password'];
                echo json_encode(['isSuccess' => true, 'message' =>  "Instructor login attempt with ID: $instructorId"]);

            } else {
                echo json_encode(['isSuccess' => false, 'message' =>  "Invalid user type."]);
            }
        } else {
            echo json_encode(['isSuccess' => false, 'message' =>  "Form data not received."]);
        }
    }
?>
