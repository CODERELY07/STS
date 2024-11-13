<?php
    require_once './config/config.php';
    session_start();
    $response = ['success' => false, 'error' => []];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // Validate username and password
        if(empty($username)){
            $response['error']['username'] = "Username is required";
        }elseif(strlen($username) < 3 || strlen($username) > 100){
            $response['error']['username'] = "Username must be between 3 and 100 characters";
        }
        
        if(empty($password)){
            $response['error']['password'] = "Password is required";
        }elseif(strlen($password) < 6){
            $response['error']['password'] = "Password must be at least 6 characters";
        }

        if(empty($response['error'])){

            $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if($user['password'] == $password){
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['token'] = password_hash(session_id(), PASSWORD_DEFAULT);
                    $response['token'] = $_SESSION['token'];
                    $response['success'] = true;
                }else{
                    $response['error']['password'] = "Incorrect Password";
                }
            }else{
                $response['error']['password'] = "User not found.";
            }
        }
        echo json_encode($response);
    }
?>