<?php
// Handles user login by validating input, checking credentials, and starting a session with a token.

error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../preventer.php';
require_once '../config/config.php';
session_start();

$response = ['success' => false, 'error' => []];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
    $password = $_POST['password'];

    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $response['error']['username'] = "Username can only contain letters, numbers, and underscores.";
    }
    
    // Validate username and password
    if (empty($username)) {
        $response['error']['username'] = "Username is required";
    } elseif (strlen($username) < 3 || strlen($username) > 100) {
        $response['error']['username'] = "Username must be between 3 and 100 characters";
    }

    if (empty($password)) {
        $response['error']['password'] = "Password is required";
    } elseif (strlen($password) < 6) {
        $response['error']['password'] = "Password must be at least 6 characters";
    }

    if (empty($response['error'])) {

        $sql = "SELECT * FROM users WHERE username = :username && role = :role LIMIT 1";
        $role = 'student';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify password using password_verify()
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['userID'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['token'] = password_hash(session_id(), PASSWORD_DEFAULT);
                $response['token'] = $_SESSION['token'];
                $response['success'] = true;
            } else {
                $response['error']['password'] = "Incorrect Password";
            }
        } else {
            $response['error']['password'] = "User not found.";
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
